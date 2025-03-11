<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnerAdminModel extends Model
{
    protected $table            = 'tbl_partners';
    protected $primaryKey       = 'partner_id';
    protected $allowedFields    = ['program_title', 'partner_slug', 'partner_description', 'program_date', 'program_status', 'category_id', 'partner_image'];
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    public function getAllPrograms($onlyPublished = false)
    {
        $builder = $this->select('tbl_programs.*, tbl_program_categories.category_name')
                        ->join('tbl_program_categories', 'tbl_programs.category_id = tbl_program_categories.category_id', 'left')
                        ->orderBy('program_date', 'DESC');

        if ($onlyPublished) {
            $builder->where('program_status', 1);
        }

        return $builder->findAll();
    }

    public function getProgramBySlug($slug)
    {
        return $this->select('tbl_programs.*, tbl_program_categories.category_name')
                    ->join('tbl_program_categories', 'tbl_programs.category_id = tbl_program_categories.category_id', 'left')
                    ->where('program_slug', $slug)
                    ->first();
    }

    public function searchProgram($query)
    {
        return $this->select('tbl_programs.*, tbl_program_categories.category_name')
                    ->join('tbl_program_categories', 'tbl_programs.category_id = tbl_program_categories.category_id', 'left')
                    ->like('program_title', $query)
                    ->orLike('program_description', $query)
                    ->orLike('tbl_program_categories.category_name', $query)
                    ->findAll();
    }

    public function toggleProgramStatus($program_id)
    {
        $program = $this->find($program_id);
        if ($program) {
            $new_status = $program['program_status'] == 1 ? 0 : 1; // Toggle status
            return $this->update($program_id, ['program_status' => $new_status]);
        }
        return false;
    }
}
