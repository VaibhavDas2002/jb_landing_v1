<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BenEntry extends Model
{
      protected $table = 'pension.beneficiaries';
      protected $primaryKey = 'id';

      public function toSearchArray()
      {
            return [
                  'ben_fname' => $this->ben_fname,
                  'ben_mname' => $this->ben_mname,
                  'ben_lname' => $this->ben_lname,
                  'aadhar_no' => $this->aadhar_no,
                  'mobile_no' => $this->mobile_no,
                  'scheme_id' => $this->scheme_id,
                  'full_name' => trim($this->ben_fname . ' ' . $this->ben_mname . ' ' . $this->ben_lname),
                  'ben_id' => $this->id,
                  'block_ulb_name' => $this->block_ulb_name,
                  'gp_ward_name' => $this->gp_ward_name,
                  'assembly_name' => $this->assembly_name,
                  'rural_urban_id' => $this->rural_urban_id,
                  'district_name' => District::where('district_code', $this->created_by_dist_code)->value('district_name'),
                  'local_body_name' => $this->getLocalBodyName(),
                  'village_town_city' => $this->village_town_city,
                  'house_premise_no' => $this->house_premise_no,
                  'post_office' => $this->post_office,
                  'pincode' => $this->pincode,
                  'bank_name' => $this->bank_name,
                  'branch_name' => $this->branch_name,
                  'bank_code' => $this->bank_code,
                  'bank_ifsc' => $this->bank_ifsc,
                  'created_by_dist_code' => $this->created_by_dist_code,
                  'created_by_local_body_code' => $this->created_by_local_body_code,
                  'block_ulb_code' => $this->block_ulb_code,
                  'gp_ward_code' => $this->gp_ward_code,
                  'next_level_role_id' => $this->next_level_role_id,
                  'dup_bank' => $this->dup_bank,
                  'dup_mobile' => $this->dup_mobile,
                  'dup_aadhar' => $this->dup_aadhar,
                  'no_aadhar' => $this->no_aadhar,
                  'no_mobile' => $this->no_mobile,
                  'is_bank_failed' => $this->is_bank_failed,
                  'pay_validated' => $this->pay_validated
            ];
      }




      public function getLocalBodyName()
      {
            $dist = $this->created_by_dist_code;
            $local = $this->created_by_local_body_code;

            $subQuery = DB::table('m_sub_district')
                  ->select(
                        'sub_district_code as local_body_code',
                        'sub_district_name as local_body_name'
                  )
                  ->where('district_code', $dist);

            $blockQuery = DB::table('m_block')
                  ->select(
                        'block_code as local_body_code',
                        'block_name as local_body_name'
                  )
                  ->where('district_code', $dist);

            // UNION BOTH datasets
            $unionQuery = $subQuery->unionAll($blockQuery);

            return DB::query()
                  ->fromSub($unionQuery, 'q')
                  ->where('local_body_code', $local)
                  ->value('local_body_name');
      }



}
