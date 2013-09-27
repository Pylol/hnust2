<?php
// 本类由系统自动生成，仅供测试用途
class MusicAction extends Action {
	public function _initialize(){
        session_start();
        if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
            $this->redirect("__APP__/Manage/index");
        }
    }
    public function fm(){
    	$user = $_SESSION["user"];
    	$us = M("user");
    	$this->userPhoto = $us->where("userNumber=".$user)->getField("userPhoto");
        $this->userExplanation = $us->where("userNumber=".$user)->getField("userExplanation");

    	$mc = M('musicclass');
    	$this->classList = $mc->select();
        $ik = M("ilike");
        $ilikeInfo = $ik->where("userNumber=".$user)->find();
        $this->collection = count(json_decode($ilikeInfo["collection"]));

    	$this->display();
    }
    public function next(){
        header('Access-Control-Allow-Origin: *'); 

        $class = $_GET['musicClass'];
        $result = array();

        if($class != 0){
            $ms = M("music");
            $result = $ms->where("musicClass=".$class)->select();
        }else{ 
            $lovelist = $this->getLoveList();
            $result = array();
            $ms = M("music");
            foreach ($lovelist as $key => $value) {
                array_push($result, $ms->where("musicID=".$value)->find());
            }
        }

        $list = $this->getLoveList();
        $rand_num = mt_rand(0,count($result)-1);
        $return = $result[$rand_num];
        $return["musicLove"] = in_array($return["musicID"], $list) ? 1 : 0;

    //    var_dump($return);
        echo json_encode($return);
    }

    public function ilike(){
        $musicID = $_GET['id'];

        $user = $_SESSION["user"];
        $ik = M("ilike");
        $clist = $ik->where("userNumber=".$user)->getField("collection");
        if(isset($clist) && !empty($clist)){
            $nlist = json_decode($clist);
            //Has been collected,remove it from list
            if(in_array($musicID, $nlist)){
                array_splice($nlist, array_search($musicID, $nlist), 1);
            }else{
                $nlist[] = $musicID;
            }
        }else{
            $nlist = array($musicID);
        }
        $clist = json_encode($nlist);

        $data["userNumber"] = $user;
        $data["collection"] = $clist;
        $count = $ik->save($data) or $ik->add($data);
        if($count > 0){
            echo "1";
        }else{
            echo "0";
        }
    }
    private function getLoveList(){
        $user = $_SESSION["user"];
        $ik = M("ilike");
        $arr = $ik->where("userNumber=".$user)->getField("collection");
        $list = json_decode($arr);
        return $list;
    }

}