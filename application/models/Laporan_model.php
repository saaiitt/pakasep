 <?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function get_all()
    {
        $query = $this->db->get('riwayat_jawaban');
        return $query->result_array();
    }
}
?>