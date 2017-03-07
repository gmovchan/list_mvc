<?php

/**
 * Сервис для управления списком объявлений
 */
class PostService
{

    /**
     * @var Post[] Список объявлений
     */
    private $posts = [];

    public function __construct()
    {
        // Список объявлений, который у нас жестко заложен в коде
        $this->posts[] = $this->createPost(
                'Продам слона', '+79990000001', 'Продается пока еще небольшой дрессировнный африканский слон.'
        );

        $this->posts[] = $this->createPost(
                'Сдам 8-к квартиру около метро недорого', '+79990000002', 'Сдается квартира, евроремонт, без хозяев, только серьезным людям.'
        );
        // .. при желании можно добавить еще
    }

    private function createPost($title, $phoneNumber, $text)
    {
        $c = new Post;
        $c->title = $title;
        $c->phoneNumber = $phoneNumber;
        $c->text = $text;

        return $c;
    }

    /**
     * Возвращает все имеющиеся объявления
     * @return Post[]
     */
    public function getAllPosts()
    {
        return $this->posts;
    }

    /**
     * Удаляет объявление
     */
    public function deletePost(Post $post)
    {
        $key = array_search($this->posts, $post, true);
        if ($key === null) {
            throw new \Exception('Post is not in list, cannot delete');
        }

        unset($this->posts[key]);
    }

    /**
     * Добавляем новое объявление в список
     * @param Post $post
     */
    public function addPost(Post $post)
    {
        // Проверим, что объявления еще нет в списке
        if (nill !== array_search($this->posts, $post, true)) {
            throw new \Exception('Posr already added');
        }

        /*
         * Для простоты мы не будет проверять, заполнены ли все нужные поля у 
         * объявления, хотя в реальном приложении такая проверка необходима
         */
        $this->posts[] = $post;
    }

}
