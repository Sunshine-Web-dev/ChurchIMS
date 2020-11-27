<?php
/**
*
* This is a class Paging
* @version 0.01
* @author Numan Tahir <numan_tahir1@yahoo.com>
* @Date 10 Aug, 2007
* @modified 10 Aug, 2007 by Numan Tahir
*
**/
class Paging extends Database{
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
	* This is the constructor of the class Paging
	* @author Numan Tahir
	* @Date 10 Aug, 2007
	* @modified 10 Aug, 2007 by Numan Tahir
	*/
	public function __construct($total = 0, $perpage = 25, $offset = 10, $link = "", $image_link = false){
		parent::__construct();
		$this->page 		= (isset($_GET['page']) && !empty($_GET['page'])) ? intval($_GET['page']) : 1;
		$this->perpage 		= $perpage;
		$this->offset 		= $offset;
		$this->links 		= (strpos($link, "?") === false) ? $link . "?" : $link . "&amp;";
		$this->sql 			= $sql;
		$this->image_link 	= $image_link;
		
		$this->total		= $total;
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
		if($this->page == 1):
			return "<span class=\"previous-off\">First</span>";
		else:
			return "<a href=\"" . $this->links . "page=1\">First</a>\n";
		endif;
	}

	/**
	* This method is used to get the previous link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function previous(){
		if($this->page == 1):
			return "<span class=\"previous-off\">&laquo; Previous</span>";
		else:
			return "<a title=\"Previous\" href=\"" . $this->links . "page=" . ($this->page - 1) . "\">Previous</a>\n";
		endif;
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
		$start 	= $this->page;
		if($this->page + $this->offset > $this->max_page):
			$offset_val = $this->max_page;
		else:
			$offset_val = ($this->page + $this->offset) - 1;
			$start = $this->page;
		endif;
		
		if($this->max_page > $this->offset){
			if(($this->page + $this->offset) >= $offset_val)
				$start = $offset_val - $this->offset;
			else
				$start = $this->page;
			$start = $start + 1;
		}
		else{
			$start = 1;
		}
		for($i = $start; $i <= $offset_val; $i++):
			if($i == $this->page):
				$ret .= "<span class=\"active\">" . $i . "</span>\n";
			else:
				$ret .= "<a href=\"" . $this->links . "page=" . $i . "\">" . $i . "</a>\n";
			endif;
		endfor;
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
		if($this->page == $this->max_page):
			return "<span class=\"next-off\">Next</span>";
		else:
			return "<a title=\"Next page\" href=\"" . $this->links . "page=" . ($this->page + 1) . "\">Next</a>\n";
		endif;
	}

	/**
	* This method is used to get the last link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function last(){
		if($this->page == $this->max_page):
			return "<span class=\"next-off\">Last</span>";
		else:
			return "<a href=\"" . $this->links . "page=" . $this->max_page . "\">Last</a>\n";
		endif;
	}
	
	/**
	* This method is used to get the last link div
	* @author Numan Tahir
	* @Date : 22 Dec, 2007
	* @modified :  22 Dec, 2007 by Numan Tahir
	* @return : bool
	*/
	function recordMessage(){
		if($this->page == 1):
			echo _PAGING_DISPLAYING . " " . 1 . " - ";
		else:
			echo _PAGING_DISPLAYING . " " . ((($this->page-1) * $this->perpage) + 1) . " - ";
		endif;
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
		//echo _PAGING_PAGES . " : ";
		// Show first and previous if this is not first.
		//if($this->page != 1):
			echo $this->first();
			echo $this->previous();
		//endif;
		// Show pages
		echo $this->pages();
		
		// Show next and last if this is not the last page.
		//if($this->page != $this->max_page):
			echo $this->next();
			echo $this->last();
		//endif;
	}
}
