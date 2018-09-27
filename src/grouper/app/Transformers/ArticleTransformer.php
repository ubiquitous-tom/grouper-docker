<?php

namespace App\Transformers;

use App\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Article $article)
    {
        return [
            'title' => $article->title,
            'author_id`' => $article->author_id,
            'slug' => $article->slug,
            'body' => $article->body,
            'created_at' => $article->created_at->format('d M Y'),
            'updated_at' => $article->updated_at->format('d M Y'),
        ];
    }

    public function includeAuthor(Article $article)
    {
        return $this->item($article->author, new UserTransformer);
    }
}
