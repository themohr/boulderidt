<?php
class FormVO {
	private $regname;
	private $regemail;
	private $regorganization;
	private $subject = "Boulder IDT"; // Set to constant?
	private $sendto = "daniel.j.burns@att.net,coloradostars@gmail.com,dennis.m.mohr@gmail.com"; // Set to constant?
	private $replyto = "webmaster@boulderidt.com"; // Set to constant?
	private $from = "webmaster@boulderidt.com"; // Set to constant (repeat of replyto)?
	private $text;
	private $insert;
	private $update;
	private $db = "costars_drup1"; // Set to constant?
	
	public function FormVO() { }
	
	public function getRegname(){
		return $this->regname;
	}
	public function setRegname($regname) {
		$this->regname = $regname;
	}
	public function getRegemail() {
		return $this->regemail;
	}
	public function setRegemail($regemail) {
		$this->regemail = $regemail;
	}
	public function getRegorganization() {
		return $this->regorganization;
	}
	public function setRegorganization($regorganization) {
		$this->regorganization = $regorganization;
	}
	public function getSubject() {
		return $this->subject;
	}
	public function setSubject($subject) {
		$this->subject = $subject;
	}
	public function getSendto() {
		return $this->sendto;
	}
	public function setSendto($sendto) {
		$this->sendto = $sendto;
	}
	public function getReplyto() {
		return $this->replyto;
	}
	public function setReplyto($replyto) {
		$this->replyto = $replyto;
	}
	public function getFrom() {
		return $this->from;
	}
	public function setFrom($from) {
		$this->from = $from;
	}
	public function getText() {
		return $this->text;
	}
	public function setText($text) {
		$this->text = $text;
	}
	public function getInsert() {
		return $this->insert;
	}
	public function setInsert($insert) {
		$this->insert = $insert;
	}
	public function getUpdate() {
		return $this->update;
	}
	public function setUpdate($update) {
		$this->update = $update;
	}
	public function getDb() {
		return $this->db;
	}
	public function setDb($db) {
		$this->db = $db;
	}
}
?>