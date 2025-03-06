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
        $id = $this->request->getPost('id');
        $program = $this->programModel->find($id);

        // Hapus gambar jika bukan default
        if ($program && $program['program_image'] !== 'default.jpg' && file_exists('uploads/programs/' . $program['program_image'])) {
            unlink('uploads/programs/' . $program['program_image']);
        }

        $this->programModel->delete($id);

        return redirect()->to('/admin/program')->with('msg', 'deleted');
    }

    public function toggle_status($id)
    {
        $program = $this->programModel->find($id);
        if ($program) {
            $new_status = ($program['program_status'] == 1) ? 0 : 1;
            $this->programModel->update($id, ['program_status' => $new_status]);
        }

        return redirect()->to('/admin/program')->with('msg', 'status updated');
    }
}
