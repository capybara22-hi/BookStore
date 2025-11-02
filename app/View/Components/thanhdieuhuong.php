<?php

namespace App\View\Components;

use Illuminate\View\Component;

class thanhdieuhuong extends Component
{
    //khai báo thuộc tính
    public $home;
    public $sanpham;

    // CÁC THUỘC TÍNH PHỤ CÓ TRONG HTML
    public $gioithieu;
    public $lienhe;
    public $taikhoan;
    public $giohang;
    public $login;
    public $register;
    public $searchRoute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($home = '/', 
        $sanpham = '#',
        
        // Các biến còn lại trong HTML, đặt giá trị mặc định để tránh lỗi
        $gioithieu = '#',
        $lienhe = '#',
        $taikhoan = '#',
        $giohang = '#',
        $login = '#',
        $register = '#',
        $searchRoute = '#')
    {
        $this->home = $home;
        $this->sanpham = $sanpham;
        $this->gioithieu = $gioithieu;
        $this->lienhe = $lienhe;
        $this->taikhoan = $taikhoan;
        $this->giohang = $giohang;
        $this->login = $login;
        $this->register = $register;
        $this->searchRoute = $searchRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.thanhdieuhuong');
    }
}
