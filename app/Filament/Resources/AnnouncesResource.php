<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncesResource\Pages;
use App\Filament\Resources\AnnouncesResource\RelationManagers;
use App\Models\Announces;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\Column;
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
                        TextInput::make('title'),
                        RichEditor::make('content'),
                        Checkbox::make('stasus')
                    ])
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('title')->label('title')->sortable()->searchable(),
            TextColumn::make('content')->label('Content')->sortable()->searchable(),
            TextColumn::make('created_at')->label('Created_At')->sortable()->searchable()
        ])         

            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
