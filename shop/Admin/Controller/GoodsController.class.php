<?php

namespace Admin\Controller;

// use Think\Controller;
// use Model\GoodsModel;
use Admin\Model;
use Component\AdminController;

class GoodsController extends AdminController {
	
	public function condition(){
		$_GET = NULL;
		$this->redirect("Goods/showlist");
	}
	
	
	public function showlist() {
// 		var_dump(session('role_auth_ids'));
		/*
		 * 跨控制器调用
		 */
		// $index = A('Index'); 实例化Indexcontroller 相当于 $index = new IndexController();
		// $index->count();
		
		// $index2 = A('Home/Index'); 实例化home下面的indexcontroller
		// $index2 -> count2();
		
		// $call = A('car://Home/Index'); //使用其他项目下 home模块下的 index控制器
		// $call ->call();
		
		// $index = R('Home/Index/count2');// 直接调用 home模块下的index控制器count2的方法， 她会自动实例化并调用
		
		// 使用数据模型
		// $goods = new \Model\GoodsModel ();
		
		
		
// 		$goods = D ( 'Goods' ); //实例化模型
// 		$count = $goods->count ();//统计这么表里面的记录数 
// 		$Page = new \Think\Page ( $count, 7 );//实例化分页对象
// 		$info = S ( 'Goods' . I ( 'get.p', 1 ) );//取出缓存
// 		if (! $info) {
// 			$info = $goods->limit ( $Page->firstRow . ',' . $Page->listRows )->select ();
// 			S ( 'Goods' . I ( 'get.p', 1 ) ,$info,10);
// 			echo '这里是一个缓存';
// 		}
				//判断是否有分页传入，如果有的话就增加分页
				if(!empty(I('get.p'))){
					$p = I('get.p');
				    session('goodsShowCurrentPage',$p);
				}else{
					$p = 1;
				}
				
				$goods = D ( 'Goods' ); //实例化模型

				
				//判断是否有条件搜索，有的话把条件搜索加进去
				$where = array();
				if(!empty(I("get.search"))){
			     $search = 	I('get.search');
					$where['goods_name'] = array('like','%'.$search.'%');   
					$this->search = I('get.search');
				}
				
				$count = $goods->where($where)->count ();//统计这么表里面的记录数
				$info = $goods->where($where)->page($p,10)->select ();
			    $Page = new \Think\Page ( $count, 10 );//实例化分页对象
				
				
				
		
		$show = $Page->show ();
		$this->pshow = $show;
		$this->info = $info;
		$this->display ();
	}
	public function addGoods() {
		$name = I('post.goods_name');
		$price = I('post.goods_price');
		$number = I('post.goods_number');
		$weight = I('post.goods_weight');
		$introduce = I('post.goods_introduce');
 
		
		
		if($d =  I('data.goods_img','','',$_FILES))
		{
			//配置upload
			$config = array(
					'rootPath'      =>  './Public/', //保存根路径
					'savePath'      =>  'upload/', //保存路径
			);
			$upload = new \Think\Upload($config);
			$re = $upload->uploadOne($d);
			if($re){
				/**
				 * 设置大图
				 */
				$re['name'] =I('goods_name').'.'.$re['ext'] ;
				$big = $re['savepath'].$re['savename'];
				$_POST['goods_big_img']  = $big;
				
				/*
				 * 设置小图
				 */
				$image =new \Think\Image(); //实例化image对象
				
				$src = $upload->rootPath.$big; //设置源图片路径
				$image->open($src);//打开
				$image->thumb(150, 150);//修改
				$name =$re['savepath'].'samll_'.$re['savename']; //设置保存图片名称
				$image->save($upload->rootPath.$name);//保存
				
				$_POST['goods_small_img'] = $name; //吧namepost进去
				
				
			}
		}
		
		$model = D  ( 'Goods' );
// 		var_dump($model);
		$model->create ();
		$re = $model->add ();
		if ($re > 0) {
			$this->success ( 'success', 'showlist' );
		}
	
		// $this->display ();
	}
	public function upGrade($id) {
		var_dump(time());
		if (empty ( $id )) {
			$this->error ( '参数错误' );
		}
		$model = M ( 'Goods' );
		$data = $model->find ( $id );
		$this->data = $data;
		$this->display ();
	}
	public function edit() {

// 		if (IS_POST) {
		if (! empty ( I ( 'post.goods_id' ) )) {
			$model = D ( 'Goods' );
			$data = array ();
			$data ['goods_id'] = I ( 'post.goods_id' );
			$data ['goods_name'] = I ( 'f_goods_name' );
			$data ['goods_weight'] = I ( 'f_goods_weight' );
			$data ['goods_number'] = I ( 'f_goods_number' );
			$data ['goods_price'] = I ( 'f_goods_price' );
			$data ['goods_image'] = I ( 'f_goods_image' );
			$data ['goods_introduce'] = I ( 'f_goods_introduce' );
			$re = $model->save ( $data );
			if ($re) {
				$this->success ( '修改成功',U('showlist?p='.session('goodsShowCurrentPage')) );
			} else {
				$this->error ( 'this is error' );
			}
		}
	}
	public function delete($id) {
		$model = M ( 'Goods' );
		// $model = D();
		// $model->q
		$re = $model->delete ( $id );
		if ($re) {
			$this->success ( '删除成功' );
		} else {
			$this->error ( '数据错误' );
		}
	}
	public function ca($tableName, $page = 1, $data) {
		$info = S ( $tableName . $page );
		if ($info) {
			return $info;
		} else {
		}
	}
}