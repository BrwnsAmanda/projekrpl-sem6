<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RujukanResource\Pages;
use App\Models\Rujukan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class RujukanResource extends Resource
{
    protected static ?string $model = Rujukan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama')
                ->required()
                ->maxLength(255),

            Select::make('user_id')
                ->label('Mitra Perujuk')
                ->relationship('user', 'name')
                ->searchable()
                ->nullable(),

            TextInput::make('alamat')
                ->label('Alamat')
                ->required()
                ->maxLength(255),

            DatePicker::make('tanggal_lahir')
                ->label('Tanggal Lahir')
                ->required(),

            TextInput::make('nik')
                ->label('NIK')
                ->required()
                ->maxLength(255),

            Select::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->options([
                    'Laki-laki' => 'Laki-laki',
                    'Perempuan' => 'Perempuan',
                ])
                ->required(),

            DatePicker::make('jadwal_pemeriksaan')
                ->label('Jadwal Pemeriksaan')
                ->required(),

            Select::make('jenis_pemeriksaan')
                ->label('Jenis Pemeriksaan')
                ->options([
                    'Hematologi' => 'Hematologi',
                    'Diabetes Melitus' => 'Diabetes Melitus',
                    'Profil Lemak' => 'Profil Lemak',
                    'Fungsi Hati' => 'Fungsi Hati',
                    'Fungsi Ginjal' => 'Fungsi Ginjal',
                    'Urinalisa' => 'Urinalisa',
                    'Hepatitis' => 'Hepatitis',
                    'Imunologi' => 'Imunologi',
                    'Infeksi Menular Seksual' => 'Infeksi Menular Seksual',
                    'Lainnya' => 'Lainnya',
                ])
                ->reactive()
                ->afterStateUpdated(fn (callable $set) => $set('detail_pemeriksaan', null))
                ->required(),

            Select::make('detail_pemeriksaan')
                ->label('Detail Pemeriksaan')
                ->options(function (callable $get) {
                    $map = [
                        'Hematologi' => ['Darah Rutin', 'LED', 'BT', 'CT', 'Golongan Darah', 'Golongan Darah + Rhesus'],
                        'Diabetes Melitus' => ['GDS', 'GDP', 'GD 2 Jam PP', 'TTGO', 'HbA1c'],
                        'Profil Lemak' => ['Cholesterol Total', 'HDL', 'LDL', 'Trigliserida'],
                        'Fungsi Hati' => ['SGOT', 'SGPT', 'Bilirubin Total', 'Bilirubin Direk', 'Bilirubin Indirek', 'Albumin'],
                        'Fungsi Ginjal' => ['Ureum', 'Creatinin', 'Asam Urat'],
                        'Urinalisa' => ['Urine Rutin', 'Urine Lengkap + Sedimen'],
                        'Hepatitis' => ['HBsAg', 'Anti HBs', 'Anti HCV'],
                        'Imunologi' => ['Widal', 'Ns1', 'IgG/IgM Dengue'],
                        'Infeksi Menular Seksual' => ['TPHA', 'VDRL', 'HIV', 'Gram GO'],
                        'Lainnya' => ['Feces Rutin', 'Analisa Sperma', 'DDR', 'BTA', 'BTA Cuka-Cuki', 'FT4', 'TSH/TSH-S', 'Ca 125', 'Elektrolit', 'B-Hcg', 'Narkoba 1 Parameter', 'Narkoba 3 Parameter', 'Narkoba 6 Parameter'],
                    ];

                    $jenis = $get('jenis_pemeriksaan');
                    return collect($map[$jenis] ?? [])->mapWithKeys(fn($item) => [$item => $item]);
                })
                ->required(),

            TextInput::make('no_telepon')
                ->label('No. Telepon')
                ->required()
                ->maxLength(255),

            Textarea::make('catatan_dokter')
                ->label('Catatan Dokter')
                ->nullable(),

                FileUpload::make('file_rujukan')
    ->label('File Rujukan')
    ->directory('rujukan')
    ->disk('s3')
    ->downloadable()
    ->visibility('public')
    ->preserveFilenames()
    ->saveUploadedFileUsing(function ($file) {
        return $file->storeAs(
            'rujukan',
            $file->getClientOriginalName(),
            's3'
        );
    })
    ->nullable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama')->searchable()->sortable(),
                TextColumn::make('user.name')->label('Mitra Perujuk')->sortable()->searchable(),
                TextColumn::make('alamat')->label('Alamat')->searchable(),
                TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->date()->sortable(),
                TextColumn::make('nik')->label('NIK')->searchable(),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin')->sortable(),
                TextColumn::make('jadwal_pemeriksaan')->label('Jadwal Pemeriksaan')->date()->sortable(),
                TextColumn::make('jenis_pemeriksaan')->label('Jenis Pemeriksaan')->searchable(),
                TextColumn::make('detail_pemeriksaan')->label('Detail Pemeriksaan')->limit(50),
                TextColumn::make('no_telepon')->label('No. Telepon')->searchable(),
                TextColumn::make('catatan_dokter')->label('Catatan Dokter')->limit(50),
                TextColumn::make('file_rujukan')->label('File Rujukan')
                    ->formatStateUsing(fn ($state) => $state ? \Illuminate\Support\Facades\Storage::disk('s3')->url($state) : '-')
                    ->url(fn ($state) => $state ? \Illuminate\Support\Facades\Storage::disk('s3')->url($state) : null)
                    ->openUrlInNewTab(),
            ])
            ->defaultSort('jadwal_pemeriksaan', 'desc')
            ->searchable()
            ->paginated(10);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRujukans::route('/'),
            'create' => Pages\CreateRujukan::route('/create'),
            'edit' => Pages\EditRujukan::route('/{record}/edit'),
        ];
    }
}
