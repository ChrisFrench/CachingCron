<?php
/**
* @package		Cachingcron
* @copyright	Copyright (C) 2009 DT Design Inc. All rights reserved.
* @license		GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
* @link 		http://www.dioscouri.com
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');


Cachingcron::load('CachingcronModelBase','models.base');

class CachingcronModelLinks extends CachingcronModelBase 
{
	
	protected function _buildQueryWhere(&$query)
    {
        $filter     = $this->getState('filter');
		$filter_id_from = $this->getState('filter_id_from');
        $filter_id_to   = $this->getState('filter_id_to');
       	$filter_name      = $this->getState('filter_name');
		$filter_url    = $this->getState('filter_url');
    	$filter_datecreated     = $this->getState('filter_datecreated ');
    	$filter_lastmodified    = $this->getState('filter_lastmodified');
		$filter_lastcron    = $this->getState('filter_lastcron');
		$filter_enabled    = $this->getState('filter_enabled');
		
        if ($filter) 
        {
            $key    = $this->_db->Quote('%'.$this->_db->getEscaped( trim( strtolower( $filter ) ) ).'%');
            $where = array();
            $where[] = 'LOWER(tbl.name) LIKE '.$key;
           
      
            $query->where('('.implode(' OR ', $where).')');
        }
		if ($filter_name) 
        {
            $key    = $this->_db->Quote('%'.$this->_db->getEscaped( trim( strtolower( $filter_name ) ) ).'%');
            $where = array();
            $where[] = 'LOWER(tbl.name) LIKE '.$key;
          
      
            $query->where('('.implode(' OR ', $where).')');
        }
		
		 if (strlen($filter_id_from))
        {
            if (strlen($filter_id_to))
            {
                $query->where('tbl.id >= '.(int) $filter_id_from);  
            }
                else
            {
                $query->where('tbl.id = '.(int) $filter_id_from);
            }
        }
        
        if (strlen($filter_id_to))
        {
            $query->where('tbl.id <= '.(int) $filter_id_to);
        }
        
    
		
		 if ($filter_url) 
        {
            $key    = $this->_db->Quote('%'.$this->_db->getEscaped( trim( strtolower( $filter_url ) ) ).'%');
            
           $query->where("tbl.url  LIKE ".$key);
        }
      
    	
    	
		
    	if (strlen($filter_datecreated))
        {
            $query->where("tbl.datecreated = '".$filter_datecreated."'");
        }
          
		    	
       if (strlen($filter_lastmodified))
        {
            $query->where("tbl.lastmodified = '".$filter_lastmodified."'");
        }

 		if (strlen($filter_lastmodified))
        {
            $query->where("tbl.filter_lastcron = '".$filter_lastcron ."'");
        }
	    
		if (strlen($filter_enabled))
        {
            $query->where("tbl.enabled = '".$filter_enabled."'");
        }
	 
    }

	 protected function _buildQueryGroup(&$query)
    {
    	
    }

	/**
     * Builds JOINS clauses for the query
     */
    protected function _buildQueryJoins(&$query)
    {
  
		
    }
	/**
	 * Builds SELECT fields list for the query
	 */
	protected function _buildQueryFields(&$query)
	{
	//	$fields = array();
		//$fields[] = " SOMETHING.* ";
		
	
	//	 $fields[] = " MAX(review.lastVisited)  ";
        
		
	//	$query -> select($fields);
		// if you move this up above the fields than the building addresses override the school address
		$query -> select($this -> getState('select', 'tbl.*'));
		
	}
	
	/*public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) {
			

		}

		return $item;
	}*/
	
	
	
	
	//admin style lists
	public function getList($refresh = false)
	{
		
		
		$items = parent::getList($refresh); 
		
		foreach(@$items as $item)
		{
			$item->link = 'index.php?option=com_cachingcron&controller=links&view=links&task=edit&id='.$item->id;
	
		}
		
		return $items;
	}
	
}