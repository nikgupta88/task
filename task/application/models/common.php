<?phpif (!defined('BASEPATH'))    exit('No direct script access allowed');class Common extends CI_Model {    public function insertUpdateDelete($sql = '') {        return $this->db->query($sql);    }    public function getData($sql) {        return $this->db->query($sql)->result();    }}