<?php
/**
* Player Class
*
* @package  phpTournament
* @author   Matthew Hurst 
*           - HurstFreelance.com
*           - piznac
* @param 
* id int
* name string
* avatar string
*
* @return
* object
*/
abstract class _Player
{
	protected  $_id = 0;
	protected  $_name;
	protected  $_avatar = 'noImage.jpg';
	private    $_query;

	/**
	* _create - Creates a record in the players table
	* @param 
	* $this->name      VARCHAR(45)
	* $this->avatar    VARCHAR(60)
	*
	* @return 
	* insert $this->id INT
	*/
	protected function _create()
	{
		include('connect.php');
		$this->_query = "INSERT INTO `players` (`name`,`avatar`)
			VALUES ('{$this->name}','{$this->avatar}')";

		if ($mysqli->query($this->_query)) {
			return $mysqli->insert_id;
		}
	}

	/**
	* _retrive - retrives records from the players table
	*
	* @param 
	* $this->name    VARCHAR(45)
	* $this->id      INT
	* $this->avatar  VARCHAR(60)
	*
	* (Work in progress)
	*
	* @return object - player
	* 
	*/
	protected function _retrive()
	{
		include('connect.php');
		if ($this->id == 0) {
			$this->_query = "SELECT * FROM `players`";
		} else {
			$this->_query = "SELECT * FROM `players` WHERE `id` = '{$this->id}' ";	
		}

		$result = $mysqli->query($this->_query);

		return $result->fetch_assoc();
	}

	/**
	* _update - Updates a record in the players table
	*
	* @param 
	* $this->name    VARCHAR(45)
	* $this->id      INT -Required
	* $this->avatar  VARCHAR(60)
	*
	* @return bool
	*/
	protected function _update()
	{
		if ($id != 0) {
			$this->_query = "UPDATE `players`
			SET `name` = '{$this->name}',`avatar` = '{$this->avatar}'
			WHERE `id` = '{$this->id}' ";

			if ($mysqli->query($this->_query)) {
				return true;
			}
		} else {
			return false;
		}
	}
}