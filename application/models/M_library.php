<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_library extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    function cek($tbl, $where, $join = null)
    {
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        return $this->db->get_where($tbl, $where)->num_rows();
    }
    function findOne($tbl, $where, $field, $join = null, $key = null, $value = null)
    {
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->where($where);
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        if ($key != null && $value != null) {
            $this->db->order_by($key, $value);
        }
        return $this->db->get()->row();
    }
    function findWhere($tbl, $where, $field, $join = null, $limit = null, $start = null, $key = null, $value = null)
    {
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->where($where);
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        if ($limit != null && $start != null) {
            $this->db->limit($limit, $start);
        }
        if ($key != null && $value != null) {
            $this->db->order_by($key, $value);
        }
        return $this->db->get()->result();
    }
    function findWhereLike($tbl, $where, $field, $join = null, $listLike = null, $like = null, $limit = null, $start = null, $key = null, $value = null)
    {
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->where($where);
        if ($listLike && $like) {
            $i = 0;
            foreach ($listLike as $item) {
                if ($like) {
                    if ($i === 0) {
                        $this->db->group_start();
                        $this->db->like($item, $like);
                    } else {
                        $this->db->or_like($item, $like);
                    }
                    if (count($listLike) - 1 == $i)
                        $this->db->group_end();
                }
                $i++;
            }
        }
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        if ($limit != null && $start != null) {
            $this->db->limit($limit, $start);
        }
        if ($key != null && $value != null) {
            $this->db->order_by($key, $value);
        }
        return $this->db->get()->result();
    }
    function findAll($tbl, $field)
    {
        $this->db->select($field);
        $this->db->from($tbl);
        return $this->db->get()->result();
    }
    function findRows($tbl, $where)
    {
        $this->db->from($tbl);
        $this->db->where($where);
        return $this->db->get()->num_rows();
    }
    function findSum($tbl, $where, $field, $join = null)
    {
        $this->db->select_sum($field);
        $this->db->from($tbl);
        $this->db->where($where);
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        return $this->db->get()->row();
    }
    function findCount($tbl, $where, $join = null)
    {
        $this->db->from($tbl);
        $this->db->where($where);
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        return $this->db->count_all_results();
    }
    function notif()
    {
        return $this->db->select('a.id_notif_admin, a.tipe,b.username,a.nominal, a.created_at')->from('tbl_notif_admin a')->join('(select c.id_referral, d.username from tbl_referral c join tbl_user d on c.id_user = d.id_user) b', 'a.id_referral = b.id_referral')->where('is_read', 0)->order_by('a.created_at', 'DESC')->get()->result();
    }
    function notifOwner()
    {
        return $this->db->select('a.id_notif_owner, a.tipe,b.username,a.nominal, a.created_at')->from('tbl_notif_owner a')->join('(select c.id_referral, d.username from tbl_referral c join tbl_user d on c.id_user = d.id_user) b', 'a.id_referral = b.id_referral')->where('is_read', 0)->order_by('a.created_at', 'DESC')->get()->result();
    }
    function notifStockies($id)
    {
        return $this->db->select('a.id_notif_stockies, a.tipe,b.username,f.username as member,a.nominal, a.created_at')->from('tbl_notif_stockies a')->join('(select c.id_referral, d.username from tbl_referral c join tbl_user d on c.id_user = d.id_user) b', 'a.id_ref_stockies = b.id_referral')->join('(select d.id_referral, e.username from tbl_referral d join tbl_user e on d.id_user = e.id_user) f', 'a.id_referral = f.id_referral', 'left')->where('is_read', 0)->order_by('a.created_at', 'DESC')->where('a.id_ref_stockies', $id)->get()->result();
    }
    function notifMember($id)
    {
        return $this->db->select('a.id_notif_member, a.tipe,b.username,a.nominal, a.created_at')->from('tbl_notif_member a')->join('(select c.id_referral, d.username from tbl_referral c join tbl_user d on c.id_user = d.id_user) b', 'a.id_referral = b.id_referral')->where('is_read', 0)->order_by('a.created_at', 'DESC')->where('a.id_referral', $id)->get()->result();
    }
    function save($tbl, $data)
    {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }
    function delete($tbl, $where)
    {
        $this->db->where($where);
        $this->db->delete($tbl);
    }
    function update($tbl, $where, $data)
    {
        $this->db->where($where);
        $this->db->update($tbl, $data);
    }
    function findOne2($tbl, $field, $val = "")
    {
        $this->db->where($field . " LIKE '%" . $val . "%'");
        $this->db->order_by($field, 'ASC');
        $dt = $this->db->get($tbl)->result_array();
        return $dt;
    }
    function cekStatus($id)
    {
        return $this->db->query('select id_user, (CASE WHEN kota IS NULL OR kota ="" OR alamat IS NULL OR alamat ="" OR jenis_kelamin IS NULL OR email ="" OR email IS NULL OR no_hp IS NULL OR no_hp ="" OR kode_pin IS NULL OR kode_pin ="" OR rek_no IS NULL OR rek_no ="" OR rek_bank IS NULL OR rek_bank ="" OR rek_atasnama IS NULL OR rek_atasnama ="" THEN NULL ELSE 1 END) as status from tbl_user where id_user = "' . $id . '"')->row();
    }
    function findOneWhere2($tbl, $field, $val, $fieldSelect, $where, $join = null)
    {
        $this->db->select($fieldSelect);
        $this->db->where($field . " LIKE '%" . $val . "%'");
        $this->db->where($where);
        if ($join) {
            $iTot = count($join);
            $d = 0;
            do {
                $this->db->join($join[$d][0], $join[$d][1], $join[$d][2]);
                $d = $d + 1;
            } while ($d < $iTot);
        }
        $this->db->order_by($field, 'ASC');
        $dt = $this->db->get($tbl)->result_array();
        return $dt;
    }
    function getQuery($query)
    {
        return $this->db->query($query)->result();
    }
}
