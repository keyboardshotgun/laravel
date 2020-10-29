<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //$testManA = Article::get();
        $testManB = Article::with('user')->get();
        // orm 관계가 있는경우 1+N 쿼리 문제가 발생할 수 있다.
        // Article::with('user')->get(); // user는 테이블 명이 아니라 Article 모델에 있는 user 메서드 이다.
        return view('board', compact('testManB'));
    }


    public function custom_message()
    {
      return ['title.required' => '제목은 필수 입력 항목 입니다.',
            'content.required' => '제목은 필수 입력 항목 입니다.',
            'content.min' => '본문의 내용은 최소 :min 글자 이상 입력하여야 합니다.'
      ];
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
//        dump($request->title);
//        dump($request->content);
//        $user = Auth::user();
//        $id = Auth::id();
//        dump(Auth::check() === false);
//        dump($user.' / '.$id);
          debug($request);
          return;

        if(Auth::check() === false){
            return redirect('auth/login');
        }else{
            $ruels = [
                'title' => ['required'],
                'content'=> ['required','min:10'],
            ];

            $validator = \Validator::make($request->all(), $ruels, $this->custom_message());

            if ($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $article = App/Model/User::find(1)->articles()->create($request->all());

            if(!$article){
                return back()->with('flash_message', '글이 저장되지 않았습니다.')->withInput();
            }

            return redirect(route('articles.index'))->with('flash_message', '작성하신 글이 저장되었습니다.');
        }
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
