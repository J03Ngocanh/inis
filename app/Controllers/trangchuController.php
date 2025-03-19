<?php 
require_once './core/controller.php';
 //require_once 'app/models/product.php';

class trangchuController extends Controller {
    private $trangchuModel;
    public function __construct() {
        $this->trangchuModel = $this->model('trangchuModel');
    }  
    public function trangchu() {
        $loaisp= $this->trangchuModel->Getloaisp(); 
        $best = $this->trangchuModel->laybestseller();
        $new = $this->trangchuModel->laynewitem();
        $this->view('menu',['loaisp' => $loaisp]);
    
        
        $this->view('trangchu/trangchu',['best' => $best, 'new' => $new]);
        $this->view('footer');
    }

    public function veinnis(){
        $loaisp= $this->trangchuModel->Getloaisp(); 
        $this->view('menu',['loaisp' => $loaisp]);
        $this->view('trangchu/veinnis');
        $this->view('footer');

    }

   

   /* public function list() {
        $product = $this->productModel->getAll();
        $this->view('products/list', $product);
    }

    public function add() {
        $product = $this->productModel->getAll1();
        $this->view('products/add', $product);
    }

    public function store() {
        $mahang = $_POST['mahang'];
        $tenhang = $_POST['tenhang'];
        $giahang = $_POST['giahang'];
        $hinhanh = $_POST['hinhanh'];
        $soluong = $_POST['soluong'];
        $maloai = $_POST['maloai'];
        $nguoithem = $_POST['nguoithem'];
        $ngaythem = $_POST['ngaythem'];
        $nguoisua = $_POST['nguoisua'];
        $ngaysua = $_POST['ngaysua'];
        $object= new product($mahang, $tenhang, $giahang, $hinhanh, $soluong, $maloai, $nguoithem, $ngaythem, $nguoisua, $ngaysua);
        $this->productModel->create($object);
        header('Location: /htaccess/products/list');
    }

    public function edit($id){
        $product = $this->productModel->getByID($id);
        $categories = $this->productModel->getAll1();
        $this->view('products/edit', ['product' => $product, 'categories' => $categories ]   );
    }

    public function update(){
        $mahang = $_POST['mahang'];
        $tenhang = $_POST['tenhang'];
        $giahang = $_POST['giahang'];
        $hinhanh = $_POST['hinhanh'];
        $soluong = $_POST['soluong'];
        $maloai = $_POST['maloai'];
        $nguoithem = $_POST['nguoithem'];
        $ngaythem = $_POST['ngaythem'];
        $nguoisua = $_POST['nguoisua'];
        $ngaysua = $_POST['ngaysua'];
        $object= new product($mahang, $tenhang, $giahang, $hinhanh, $soluong, $maloai, $nguoithem, $ngaythem, $nguoisua, $ngaysua);
        $this->productModel->update($object);
        header('Location: /htaccess/products/list');
    }

    public function delete($id){
         $this->productModel->delete($id);
        header('Location: /htaccess/products/list');

    }

    public function search() {
        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
        
        // Nếu có từ khóa, thực hiện tìm kiếm
        if (!empty($keyword)) {
            $product = $this->productModel->search($keyword);
        } else {
            $product = null; // Không thực hiện tìm kiếm nếu không có từ khóa
        }
    
        include './app/views/products/search.php';
    } */
    
}
?>