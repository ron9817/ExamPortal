<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\ExamPortal\Admin\OptionHelper;


class OptionController extends Controller
{

    public function get( OptionHelper $helper )
    {
        $options = $helper->get();
        return view('Admin.option')->with( "options", $options );
    }

    public function getById( $id, OptionHelper $helper )
    {
        $option = $helper->getById( $id );
        return $option;
    }

    public function add( Request $request , OptionHelper $helper )
    {
        $helper->add( $request );
        return redirect()->route('admin.option');

    }

    public function delete( $id, OptionHelper $helper )
    {
        $helper->delete( $id );
        return redirect()->route('admin.option');        

    }

    public function update( $id, Request $request , OptionHelper $helper )
    {
        $helper->update( $id, $request );
        return redirect()->route('admin.option');

    }
}