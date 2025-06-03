<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;


class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

     public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true), // Pastikan email unik, tapi abaikan record yang sedang diedit
                TextInput::make('password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create') // Password wajib saat CREATE, tidak saat EDIT
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => \Illuminate\Support\Facades\Hash::make($state)) // Hash password sebelum disimpan
                    ->dehydrated(fn (string $operation): bool => $operation === 'create'), // Hanya proses hashing saat CREATE
                    // Atau untuk update password, bisa dibuat field terpisah atau handled di update logic Resource
                    // Untuk simplifikasi awal, password hanya bisa di-set saat membuat user baru
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'dokter' => 'Dokter',
                        'user' => 'Pengguna Biasa',
                    ])
                    ->required()
                    ->default('user'), // Default role saat tambah user baru
                // Jika Anda ingin menampilkan/mengedit email_verified_at
                // DateTimePicker::make('email_verified_at')
                //    ->label('Email Verified At')
                //    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                     ->searchable()
                     ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Anda bisa menambah filter di sini, contoh:
                // SelectFilter::make('role')
                //    ->options([
                //        'admin' => 'Admin',
                //        'dokter' => 'Dokter',
                //        'user' => 'Pengguna Biasa',
                //    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // Tambahkan tombol hapus
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
