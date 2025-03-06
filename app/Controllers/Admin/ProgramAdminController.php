<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SiteModel;
use App\Models\InboxModel;
use App\Models\CommentModel;
use App\Models\ProgramAdminModel;
use App\Models\ProgramCategoryModel;

class ProgramAdminController extends BaseController
{
    protected $programModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->siteModel = new SiteModel();
        $this->inboxModel = new InboxModel();
        $this->commentModel = new CommentModel();
        $this->programModel = new ProgramAdminModel();
        $this->categoryModel = new ProgramCategoryModel();

        $this->akun = session()->get('akun');
        $this->active = 'program';
    }

    public function index()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'akun' => $this->akun,
            'title' => 'All Program', // Sesuaikan dengan sidebar
            'active' => $this->active,
            'total_inbox' => $this->inboxModel->where('inbox_status', 0)->get()->getNumRows(),
            'inboxs' => $this->inboxModel->where('inbox_status', 0)->findAll(),
            'total_comment' => $this->commentModel->where('comment_status', 0)->get()->getNumRows(),
            'comments' => $this->commentModel->where('comment_status', 0)->findAll(6),
            'helper_text' => helper('text'),
            'breadcrumbs' => $this->request->getUri()->getSegments(),
            'categories' => $this->categoryModel->findAll(), // Tambahkan ini
            'programs' => $this->programModel->getAllPrograms(),
        ];

        return view('admin/v_programs', $data);
    }

    public function add_new()
    {
        $data = [
            'site' => $this->siteModel->find(1),
            'akun' => $this->akun,
            'title' => 'Add New Program',
            'active' => $this->active,
            'total_inbox' => $this->inboxModel->where('inbox_status', 0)->countAllResults(),
            'inboxs' => $this->inboxModel->where('inbox_status', 0)->findAll(5),
            'total_comment' => $this->commentModel->where('comment_status', 0)->countAllResults(),
            'comments' => $this->commentModel->where('comment_status', 0)->findAll(6),
            'helper_text' => helper('text'),
            'breadcrumbs' => $this->request->getUri()->getSegments(),
            'categories' => $this->categoryModel->findAll()
        ];
        return view('admin/v_program_add', $data);
    }

    public function publish()
    {
        if (!$this->validate([
            'program_title' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'alpha_numeric_space' => 'Inputan tidak boleh mengandung karakter aneh'
                ]
            ],
            'slug' => [
                'rules' => 'required|alpha_dash|is_unique[tbl_programs.program_slug]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'alpha_dash' => 'Inputan harus berupa alfabet dan strip',
                    'is_unique' => 'Slug sudah digunakan, silakan pilih yang lain'
                ]
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!'
                ]
            ],
            'program_date' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'valid_date' => 'Format tanggal tidak valid (YYYY-MM-DD)'
                ]
            ],
            'filefoto' => [
                'rules' => 'max_size[filefoto,2048]|is_image[filefoto]|mime_in[filefoto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang Anda pilih bukan gambar',
                    'mime_in' => 'Yang Anda pilih bukan gambar'
                ]
            ],
            'category' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Kolom {field} harus diisi!',
                    'numeric' => 'Inputan harus angka'
                ]
            ]
        ])) {
            return redirect()->to('/admin/program/add_new')->withInput()->with('peringatan', 'Data gagal disimpan karena ada inputan yang tidak sesuai. Silakan coba lagi!');
        }

        // Cek apakah ada file gambar yang diunggah
        if ($this->request->getFile('filefoto')->isValid()) {
            $fotoUpload = $this->request->getFile('filefoto');
            $namaFotoUpload = $fotoUpload->getRandomName();

            // Simpan dan kompres gambar
            \Config\Services::image()
                ->withFile($fotoUpload)
                ->resize(1000, 800, true)
                ->save('assets/backend/images/programs/' . $namaFotoUpload);
        } else {
            $namaFotoUpload = 'default-program.png';
        }

        // Ambil data dari input form
        $programTitle = strip_tags(htmlspecialchars($this->request->getPost('program_title'), ENT_QUOTES));
        $description = $this->request->getPost('description');
        $programDate = strip_tags(htmlspecialchars($this->request->getPost('program_date'), ENT_QUOTES));
        $category = strip_tags(htmlspecialchars($this->request->getPost('category'), ENT_QUOTES));
        $slug = strip_tags(htmlspecialchars($this->request->getPost('slug'), ENT_QUOTES));

        // Jika slug sudah ada, tambahkan angka unik
        if ($this->programModel->where('program_slug', $slug)->countAllResults() > 0) {
            $uniqueNum = rand(1, 999);
            $slug = $slug . '-' . $uniqueNum;
        }

        // Simpan ke database
        $this->programModel->save([
            'program_title' => $programTitle,
            'program_description' => $description,
            'program_image' => $namaFotoUpload,
            'program_date' => $programDate, // Menyimpan tanggal program
            'category_id' => $category,
            'program_slug' => $slug,
            'created_by' => session('id'),
            'status' => 1 // 1 = aktif
        ]);

        return redirect()->to('/admin/program')->with('msg', 'success');
    }


    public function save()
    {
        $title = $this->request->getPost('title');
        $slug = strtolower(str_replace(" ", "-", trim($title)));
        $desc = $this->request->getPost('description');
        $date = $this->request->getPost('date');
        $status = $this->request->getPost('status');
        $category_id = $this->request->getPost('category_id');

        // Upload image
        $image = $this->request->getFile('program_image');
        $imageName = 'default.jpg'; // Default image
        
        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/programs/', $imageName);
        }

        $this->programModel->save([
            'program_title' => $title,
            'program_slug' => $slug,
            'program_description' => $desc,
            'program_date' => $date,
            'program_status' => $status,
            'category_id' => $category_id,
            'program_image' => $imageName
        ]);

        return redirect()->to('/admin/program')->with('msg', 'success');
    }

    public function edit()
    {
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        $slug = strtolower(str_replace(" ", "-", trim($title)));
        $desc = $this->request->getPost('description');
        $date = $this->request->getPost('date');
        $status = $this->request->getPost('status');
        $category_id = $this->request->getPost('category_id');

        $program = $this->programModel->find($id);
        $image = $this->request->getFile('program_image');

        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/programs/', $imageName);

            // Hapus file lama jika bukan default
            if ($program['program_image'] !== 'default.jpg' && file_exists('uploads/programs/' . $program['program_image'])) {
                unlink('uploads/programs/' . $program['program_image']);
            }
        } else {
            $imageName = $program['program_image'];
        }

        $this->programModel->update($id, [
            'program_title' => $title,
            'program_slug' => $slug,
            'program_description' => $desc,
            'program_date' => $date,
            'program_status' => $status,
            'category_id' => $category_id,
            'program_image' => $imageName
        ]);

        return redirect()->to('/admin/program')->with('msg', 'info');
    }

    public function delete()
    {
        $program_id = $this->request->getPost('id');
        $this->programModel->delete($program_id);
        return redirect()->to('/admin/program')->with('msg', 'success-delete');
    }

    public function toggle_status($id) 
    {
        $program = $this->programModel->find($id);
        if ($program) {
            // Mengubah status dari 'active' ke 'inactive' atau sebaliknya
            $new_status = ($program['program_status'] == 'active') ? 'inactive' : 'active';
            
            // Update status ke database
            $this->programModel->update($id, ['program_status' => $new_status]);
        }

        return redirect()->to('/admin/program')->with('msg', 'Status updated');
    }
    
}
