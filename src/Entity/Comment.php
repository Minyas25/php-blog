<?php
namespace App\Entity;

class Comment{
    private int $id;
    private string $username;
    private string $comment;
    private int $articleId;
    public function __construct(int $id, string $username, string $comment, int $articleId) {
        $this->id = $id;
        $this->username = $username;
        $this->comment = $comment;
        $this->articleId = $articleId;
    }    

	/**
	 * @return 
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param  $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getUsername(): string {
		return $this->username;
	}
	
	/**
	 * @param  $username 
	 * @return self
	 */
	public function setUsername(string $username): self {
		$this->username = $username;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getComment(): string {
		return $this->comment;
	}
	
	/**
	 * @param  $comment 
	 * @return self
	 */
	public function setComment(string $comment): self {
		$this->comment = $comment;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getArticleId(): int {
		return $this->articleId;
	}
	
	/**
	 * @param  $articleId 
	 * @return self
	 */
	public function setArticleId(int $articleId): self {
		$this->articleId = $articleId;
		return $this;
	}
}