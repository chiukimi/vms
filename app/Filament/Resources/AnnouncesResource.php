<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Announces;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Columns\Column;
use Filament\Forms\Components\Checkbox;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\AnnouncesResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AnnouncesResource\RelationManagers;

class AnnouncesResource extends Resource
{
    protected static ?string $model = Announces::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        TextInput::make('title')
                            ->reactive()
                            ->required(),
                        TextInput::make('author')
                            // ->label(__('filament-blog::filament-blog.author'))
                            
                            ->required(),
                            RichEditor::make('content')
                            ->extraAttributes([
                                'style' => 'word-wrap: break-word;', // 或使用 'overflow-wrap: break-word;' 屬性
                            ]),
                        FileUpload::make('banner')
                        // ->label(__('filament-blog::filament-blog.banner'))
                        // ->image()
                        // ->maxSize(config('filament-blog.banner.maxSize', 10240))
                        // ->imageCropAspectRatio(config('filament-blog.banner.cropAspectRatio', '16:9'))
                        // ->disk(config('filament-blog.banner.disk', 'public'))
                        // ->directory(config('filament-blog.banner.directory', 'blog'))
                        // ->storeFileNamesIn('original_filename')
                        // ->columnSpan([
                        //     'sm' => 2,
                        // ]),
                        ->columns(1)
                        ->directory('image')
                        ->enableDownload()
                        ->preserveFilenames(),
                        // ->storeFileNamesIn('organal_filename'),

                        
                        
                    ])
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            ImageColumn::make('banner')->label('banner'),
            TextColumn::make('title')->label('title')->sortable()->searchable(),
            TextColumn::make('created_at')->label('Created_At')->sortable()->searchable()
        ])         

            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                Tables\Actions\EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnounces::route('/'),
            'create' => Pages\CreateAnnounces::route('/create'),
            'edit' => Pages\EditAnnounces::route('/{record}/edit'),
        ];
    }    
}
