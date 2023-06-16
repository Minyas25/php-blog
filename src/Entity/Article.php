<?php
namespace App\Entity;
class Article{
    private int $id;
    private string $name;
    private string $description;
    private int $categoryId;
    public function __construct(string $name, string $description, int $categoryId, int $id) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->categoryId = $categoryId;
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return 
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param  $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param  $description 
	 * @return self
	 */
	public function setDescription(string $description): self {
		$this->description = $description;
		return $this;
	}

	/**
	 * @return 
	 */
	public function getCategoryId(): int {
		return $this->categoryId;
	}
	
	/**
	 * @param  $categoryId 
	 * @return self
	 */
	public function setCategoryId(int $categoryId): self {
		$this->categoryId = $categoryId;
		return $this;
	}
}