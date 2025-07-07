<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\Number;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;
use MoonShine\CKEditor\Fields\CKEditor;
use MoonShine\Fields\Image;


/**
 * @extends ModelResource<Book>
 */
class BookResource extends ModelResource
{
    protected string $model = Book::class;

    protected string $title = 'Books';

    /**
     * @return list<MoonShineComponent|Field>
     */

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('title')->sortable(),
            Text::make('Publication Year', 'publication_year' )->sortable(),
            BelongsTo::make('Author', 'author')->sortable(),
            BelongsTo::make('Genre', 'genre')->sortable(),
            Number::make('Price')->sortable(),
            Number::make('Count')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            Text::make('title'),
            Image::make('Cover')
                ->dir('covers')
                ->allowedExtensions(['jpg', 'jpeg', 'png', 'webp'])
                ->removable()
                ->nullable(),
            CKEditor::make('Description')->nullable(),
            Text::make('Publication Year', 'publication_year' ),
            BelongsTo::make('Author', 'author'),
            BelongsTo::make('Genre', 'genre'),
            Number::make('Price'),
            Number::make('Count'),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),
            Text::make('title'),
            Image::make('Cover'),
            CKEditor::make('Description'),
            Text::make('Publication Year', 'publication_year' ),
            BelongsTo::make('Author', 'author'),
            BelongsTo::make('Genre', 'genre'),
            Number::make('Price'),
            Number::make('Count'),
        ];
    }

    public function search(): array
    {
        return [
            'surname',
            'biography'
        ];
    }

//    public function fields(): array
//    {
//        return [
//            Block::make([
//                ID::make()->sortable(),
//            ]),
//        ];
//    }

    /**
     * @param Book $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
