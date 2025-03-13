<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AboutModel;
use App\Models\AuthorModel;
use App\Models\HomeModel;
use App\Models\SiteModel;
use App\Models\ProgramAdminModel;
use App\Models\ProgramCategoryModel;

class ProgramsController extends BaseController
{
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->siteModel = new SiteModel();
        $this->aboutModel = new AboutModel();
        $this->programModel = new ProgramAdminModel();
        $this->categoryModel = new ProgramCategoryModel();
    }
    
    public function index($slug = null) 
    {
        if ($slug == null) {
            $data = [
                'site' => $this->siteModel->find(1),
                'home' => $this->homeModel->find(1),
                'about' => $this->aboutModel->find(1),
                'programs' => $this->programModel->getAllPrograms(),
                'pager' => $this->programModel->pager,
                'title' => 'Program-program',
                'active' => 'program'
            ];
            return view('pages/programs_view', $data);
        }

        // Ambil data program berdasarkan slug
        $program = $this->programModel->getProgramBySlug($slug);

        // Jika program tidak ditemukan, redirect ke halaman utama program
        if (!$program) {
            return redirect()->to('/program')->with('error', 'Program tidak ditemukan.');
        }

        $program_id = $program['program_id']; // Aman karena sudah dicek
        $category_id = $program['category_id'];

        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'program' => $program,
            'categories' => $this->categoryModel->getAllCategoriesWithPrograms(),
            'title' => $program['program_title'],
            'active' => 'program'
        ];

        return view('pages/program_detail', $data);
    }


    public function search()
    {
        $query = $this->request->getGet('search_query');
        if (!$query) {
            return redirect()->to('/program');
        }
        $result = $this->programModel->search_program($query);
        if ($result->getNumRows() < 1) {
            $programs = $result->getResultArray();
            $keyword = "'$query' tidak ditemukan";
        } else {
            $programs = $result->getResultArray();
            $keyword = "$query ";
        }
        $data = [
            'site' => $this->siteModel->find(1),
            'home' => $this->homeModel->find(1),
            'about' => $this->aboutModel->find(1),
            'title' => 'Search',
            'keyword' => $keyword,
            'programs' => $programs,
            'active' => 'program'
        ];
        return view('pages/program_search', $data);
    }
}
