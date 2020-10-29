<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\Article;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testManA = DB::table('articles')->where('id','<>','1')->get();

        var_dump($testManA);

        print_r($testManA);

        return __METHOD__ . '은 Article 컬렉션을 조회 합니다.';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return __METHOD__ . '은 Article 컬렉션을 만들기 위한 폼을 반환 합니다.';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 'echo----------'.$request->nickname;
        return 'store는 사용자 입력폼 데이터로 새로운 데이터 컬렉션을 생성 합니다.';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return __METHOD__ . '은 Article 기본키로 모델을 조회 합니다.';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return __METHOD__ . '은 Article 사용자의 수정하기 위한 입력 폼을 반환 합니다. ';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return __METHOD__ . '은 Article 사용자가 수정폼에 입력한 데이터를 기본키를 사용하여 업데이트 합니다. ';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return __METHOD__ . '은 Article 기본키로 해당 데이터를 삭제 합니다.';
    }
}
