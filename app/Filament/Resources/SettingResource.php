<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Pengaturan';
    protected static ?string $modelLabel = 'Pengaturan';
    protected static ?string $pluralModelLabel = 'Pengaturan';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?int $navigationSort = 100;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('group')
                ->options([
                    'general' => 'Umum',
                    'contact' => 'Kontak',
                    'social' => 'Media Sosial',
                    'seo' => 'SEO',
                ])
                ->required()
                ->columnSpan(1),
            Forms\Components\Select::make('type')
                ->options([
                    'text'     => 'Text',
                    'textarea' => 'Textarea',
                    'image'    => 'Image',
                    'url'      => 'URL',
                    'email'    => 'Email',
                    'phone'    => 'Phone',
                ])
                ->required()
                ->live()
                ->columnSpan(1),
            Forms\Components\TextInput::make('key')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            // Nilai teks biasa
            Forms\Components\TextInput::make('value')
                ->label('Nilai')
                ->maxLength(500)
                ->columnSpanFull()
                ->visible(fn ($get) => in_array($get('type'), ['text', 'url', 'email', 'phone'])),

            // Nilai textarea
            Forms\Components\Textarea::make('value')
                ->label('Nilai')
                ->rows(4)
                ->columnSpanFull()
                ->visible(fn ($get) => $get('type') === 'textarea'),

            // Nilai image - file upload
            Forms\Components\FileUpload::make('value')
                ->label('Gambar')
                ->image()
                ->directory('settings')
                ->previewable(true)
                ->columnSpanFull()
                ->visible(fn ($get) => $get('type') === 'image'),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('group')
                    ->badge(),
                Tables\Columns\TextColumn::make('key')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->limit(50),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->defaultSort('group')
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->options([
                        'general' => 'Umum',
                        'contact' => 'Kontak',
                        'social' => 'Media Sosial',
                        'seo' => 'SEO',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
