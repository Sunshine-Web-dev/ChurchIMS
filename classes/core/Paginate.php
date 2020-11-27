<?php
/**
*
* This is a class Paginate
* @version 0.01
* @author Numan Tahir <numan_tahir1@yahoo.com>
* @Date 10 Aug, 2007
* @modified 10 Aug, 2007 by Numan Tahir
*
**/
class Paginate extends Database{
	protected $start;
	protected $perpage;
	protected $page;
	protected $total;
	protected $links;
	protected $sql;
	protected $offset;
	protected $max_page;
	protected $image_link;
	
	/**
	* This is the constructor of the class Paginate
	* @author Numan Tahir
	* @Date 10 Aug, 2007
	* @modified 10 Aug, 2007 by Numan Tahir
	*/
	public function __construct($sql, $perpage, $offset, $link = "", $image_link = false){
		parent::__construct();
		$this->page 		= (isset($_GET['page']) && !empty($_GET['page'])) ? intval($_GET['page']) : 1;
		$this->perpage 		= $perpage;
		$this->offset 		= $offset;
		$this->links 		= (strpos($link, "?") === false) ? $link . "?" : $link . "&amp;";
		$this->sql 			= $sql;
		$this->image_link 	= $image_link;
		
		$limit_start	= strpos($this->sql, "LIMIT");
		if($limit_start !== false){
			$this->sql	= substr($this->sql, 0, $limit_start);
		}
		$this->dbQuery($this->sql);
		$this->total		= $this->totalRecords();
		$this->max_page		= ceil($this->total / $this->perpage);
	}

	/**
	* This method is used to get the first link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function first(){
		if($this->image_link){
			return "<span><a title=\"First\" href=\"" . $this->links . "page=1\"><img title=\"First\" src=\"" . IMAGES_URL . "btn_first.gif\" border=\"0\" /></a></span>\n";
		}
		else{
			return "<a class=\"page\" href=\"" . $this->links . "page=1\"><span class=\"pagingBox\">|&lt;&lt;</span></a>\n";
		}
	}

	/**
	* This method is used to get the previous link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function previous(){
		if($this->page == 1){
			return "";
		}else{
			if($this->image_link){
				return "<span><a title=\"Previous\" href=\"" . $this->links . "page=" . ($this->page - 1) . "\"><img title=\"Previous\" src=\"" . IMAGES_URL . "btn_previous.gif\" border=\"0\" /></a></span>\n";
			}
			else{
				return "<a class=\"page\" title=\"Previous\" href=\"" . $this->links . "page=" . ($this->page - 1) . "\"><span class=\"pagingBox\"> &lt; </span></a>\n";
			}
		}
	}
	
	/**
	* This method is used to get the page number links
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function pages(){
		$ret 	= "";
		$start 	= 1; 
		if($this->page + $this->offset > $this->max_page){
			$offset_val = $this->max_page;
		}
		else{
			$offset_val = ($this->page + $this->offset)-1;
			$start = $this->page;
		}
		for($i = $start; $i <= $offset_val; $i++){
			if($i == $this->page){
				$ret .= "<span class=\"pagingBoxSel\">" . $i . "</span>\n";
			}else{
				$ret .= "<a class=\"page\" href=\"" . $this->links . "page=" . $i . "\"><span class=\"pagingBox\">" . $i . "</span></a>\n";
			}
		}
		return $ret;
	}
	
	/**
	* This method is used to get the next link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function next(){
		if($this->page == $this->max_page){
			return "";
		}else{
			if($this->image_link){
				return "<span><a title=\"Next\" href=\"" . $this->links . "page=" . ($this->page + 1) . "\"><img title=\"Next\" src=\"" . IMAGES_URL . "btn_next.gif\" border=\"0\" /></a></span>\n";
			}
			else{
				return "<a class=\"page\" title=\"Next page\" href=\"" . $this->links . "page=" . ($this->page + 1) . "\"><span class=\"pagingBox\"> &gt; </span></a>\n";
			}
		}
	}

	/**
	* This method is used to get the last link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function last(){
		if($this->image_link){
			return "<span><a title=\"Last\" href=\"" . $this->links . "page=" . $this->max_page . "\"><img title=\"Last\" src=\"" . IMAGES_URL . "btn_last.gif\" border=\"0\" /></a></span>\n";
		}
		else{
			return "<a class=\"page\" href=\"" . $this->links . "page=" . $this->max_page . "\"><span class=\"pagingBox\">&gt;&gt;|</span></a>\n";
		}
	}
	
	/**
	* This method is used to get the last link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function recordMessage(){
		if($this->page == 1){
			echo _PAGING_DISPLAYING . " " . 1 . " - ";
		}
		else{
			echo _PAGING_DISPLAYING . " " . ((($this->page-1) * $this->perpage) + 1) . " - ";
		}
		if(($this->page * $this->perpage) >= $this->total)
			echo $this->total . " " . _PAGING_OF . " " . $this->total;
		else
			echo (($this->page - 1) * $this->perpage) + $this->perpage . " of " . $this->total;
	}

	/**
	* This method is used to print all the divs/links
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function showpages(){
		echo _PAGING_PAGES . " : ";
		// Show first and previous if this is not first.
		if($this->page != 1){
			echo $this->first();
			echo $this->previous();
		}
		// Show pages
		echo $this->pages();
		
		// Show next and last if this is not the last page.
		if($this->page != $this->max_page){
			echo $this->next();
			echo $this->last();
		}
	}
}
