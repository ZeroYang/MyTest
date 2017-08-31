<?php 
 class C3D{
 	protect $qihao;//期号
 	protect $num;//号码
 	protect $sum;//和值
 	protect $xingtai;//形态
 	protect $kuadu;//跨度
 	protect $yilou;//当前遗漏
 	protect $yilou_history;//遗漏历史 

 	protect $bai;//百位
 	protect $shi;//十位
 	protect $ge;//个位 

 }

public function C3D($_qihao, $_num)
{
	$this->qihao=$_qihao;
	$this->num = $_num;
	doSplit($_num);
	$this->sum = doSum();
	$this->xingtai = doXingtai();
}

public function Save()
{
	//TODO 报存
}

function doSplit($_num)
{
	$this->bai = (int)(intval($_num)/100);
	$this->shi =(int)(intval($_num)/10%10);
	$this->ge = intval($_num)%100%10;
}

function doSum()
{
	$ret = $this->bai + $this->shi + $this->ge;
	return $ret;
}

function doXingtai()
{
	$ret="组六";
	if($this->bai == $this->shi)
		$ret = "组三";
	if($this->bai == $this->ge)
		$ret = "组三";
	if($this->shi == $this->ge)
		$ret = "组三";
	if($this->bai == $this->shi  && $this->shi==$this->ge)
		$ret = "豹子";

	return ret;
}

//直选转组选
function zhixuan2zuxuan($num)
{
	$ret = "";

	$tmp;
	if($this->bai > $this->shi)
	{
		$tmp = $this->bai;
		$this->bai = $this->shi;
		$this->shi = $tmp;
	}
	if($this->bai > $this->ge)
	{
		$tmp = $this->bai;
		$this->shi = $this->ge;
		$this->ge = $tmp;
	}

	if($this->shi > $this->ge)
	{
		$tmp = $this->shi;
		$this->shi = $this->ge;
		$this->ge = $tmp;
	}

	$ret = $this->bai."".$this->shi."".$this->ge;

    $this->kuadu = $this->ge - $this->bai;

	return $ret;
}

?>