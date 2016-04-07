<?php
/**
 * User: loveyu
 * Date: 2016/4/8
 * Time: 1:40
 */

namespace CLib;

/**
 * Class pager 分页核心类
 * @package CLib
 */
class pager{
	/**
	 * @var int
	 */
	private $count;
	/**
	 * @var int
	 */
	private $one_page;
	/**
	 * @var int
	 */
	private $now_page;

	/**
	 * @var int 总页数
	 */
	private $all_page = 0;

	/**
	 * @var int 当前页
	 */
	private $current_page;

	/**
	 * 分页类
	 * pager constructor.
	 * @param int $count    总数
	 * @param int $one_page 没页条数
	 * @param int $now_page 当前页
	 */
	public function __construct($count, $one_page, $now_page){
		if($one_page <= 0){
			$one_page = 10;
		}
		if($one_page <= 0){
			$one_page = 1;
		}
		$this->count = $count;
		$this->one_page = $one_page;
		$this->now_page = $now_page;
		$this->all_page = ceil($count / (double)$one_page);
		$this->current_page = $one_page > $this->all_page ? $this->all_page : $one_page;
	}


	/**
	 * 获取当前SQL的偏移
	 * @return array [start,length]
	 */
	public function get_limit(){
		return [($this->current_page - 1) * $this->one_page, $this->one_page];
	}

}