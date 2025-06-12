<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReservasiResource\Pages;
use App\Models\Reservasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;

class ReservasiResource extends Resource
{
    protected static ?string $model = Reservasi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required(),

            TextInput::make('nik')
                ->label('NIK')
                ->required()
                ->maxLength(255),

            TextInput::make('telepon')
                ->label('Nomor WhatsApp Aktif')
                ->required()
                ->maxLength(255),

            DatePicker::make('tanggal_lahir')
                ->label('Tanggal Lahir')
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
    'Hematologi' => [
        'Darah Rutin',
        'Laju Endap Darah (LED)',
        'Waktu Perdarahan (BT)',
        'Waktu Pembekuan (CT)',
        'Golongan Darah',
        'Golongan Darah + Rhesus'
    ],
    'Diabetes Melitus' => [
        'Glukosa Darah Sewaktu',
        'Glukosa Darah Puasa',
        'Glukosa Darah 2 Jam PP',
        'TTGO',
        'HbA1c'
    ],
    'Profil Lemak' => [
        'Cholesterol Total',
        'HDL Cholesterol',
        'LDL Cholesterol',
        'Trigliserida'
    ],
    'Fungsi Hati' => [
        'SGOT',
        'SGPT',
        'Bilirubin Total',
        'Bilirubin Direk',
        'Bilirubin Indirek',
        'Albumin'
    ],
    'Fungsi Ginjal' => [
        'Ureum',
        'Creatinin',
        'Asam Urat'
    ],
    'Urinalisa' => [
        'Urine Rutin',
        'Urine Lengkap + Sedimen'
    ],
    'Hepatitis' => [
        'HBsAg Kualitatif',
        'Anti HBs Kuantitatif',
        'Anti HCV Kualitatif'
    ],
    'Imunologi' => [
        'Widal',
        'Ns1',
        'IgG/IgM Dengue'
    ],
    'Infeksi Menular Seksual' => [
        'TPHA',
        'VDRL',
        'HIV',
        'Gram GO'
    ],
    'Lainnya' => [
        'Feces Rutin',
        'Analisa Sperma',
        'DDR (Malaria Apusan)',
        'BTA (Mikroskop)',
        'BTA Cuka-Cuki',
        'FT4',
        'TSH/TSH-S',
        'Ca 125',
        'Elektrolit',
        'B-Hcg',
        'Narkoba 1 Parameter',
        'Narkoba 3 Parameter',
        'Narkoba 6 Parameter'
    ],
];


                    $jenis = $get('jenis_pemeriksaan');
                    return collect($map[$jenis] ?? [])->mapWithKeys(fn($item) => [$item => $item]);
                })
                ->required(),

            TextInput::make('jenis_kelamin')
                ->label('Jenis Kelamin')
                ->nullable()
                ->maxLength(255),

            TextInput::make('alamat')
                ->label('Alamat')
                ->nullable()
                ->maxLength(255),

            TextInput::make('harga')
                ->label('Harga')
                ->disabled()
                ->numeric()
                ->default(0)
                ->step(0.01),

            Select::make('status')
                ->label('Status')
                ->options([
                    'Menunggu Pembayaran' => 'Menunggu Pembayaran',
                    'Lunas' => 'Lunas',
                ])
                ->default('Menunggu Pembayaran')
                ->required(),

            Select::make('rujukan')
                ->label('Punya Rujukan Dokter?')
                ->options([
                    'ya' => 'Ya',
                    'tidak' => 'Tidak',
                ])
                ->required(),

            FileUpload::make('surat_rujukan')
                ->label('Unggah Surat Rujukan')
                ->directory('rujukan')
                ->nullable(),

            FileUpload::make('hasil_pemeriksaan')
                ->label('Upload Hasil Pemeriksaan')
                ->directory('hasil-pemeriksaan')
                ->nullable(),

                    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.email')
                    ->label('Akun')
                    ->formatStateUsing(fn ($state, $record) => $record->user ? $record->user->email : 'Reservasi tanpa login'),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nik')
                    ->label('NIK')
                    ->searchable(),

                TextColumn::make('telepon')
                    ->label('No. WhatsApp'),

                TextColumn::make('tanggal_lahir')
                    ->label('Tgl Lahir')
                    ->date(),

                TextColumn::make('jadwal_pemeriksaan')
                    ->label('Jadwal')
                    ->date()
                    ->sortable(),

                TextColumn::make('jenis_pemeriksaan')
                    ->label('Jenis Pemeriksaan'),

                TextColumn::make('detail_pemeriksaan')
                    ->label('Detail'),

                BadgeColumn::make('rujukan')
                    ->label('Rujukan')
                    ->colors([
                        'primary' => 'ya',
                        'gray' => 'tidak',
                    ]),

                ImageColumn::make('surat_rujukan')
                    ->label('Surat Rujukan')
                    ->visibility('visible')
                    ->circular(),

                ImageColumn::make('hasil_pemeriksaan')
                    ->label('Hasil Pemeriksaan')
                    ->visibility('visible')
                    ->circular(),

                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin'),

                TextColumn::make('alamat')
                    ->label('Alamat'),

                TextColumn::make('harga')
                    ->label('Harga')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Status'),
            ])
            ->defaultSort('jadwal_pemeriksaan', 'desc')
            ->searchable()
            ->paginated([10, 25, 50]);
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
            'index' => Pages\ListReservasis::route('/'),
            'create' => Pages\CreateReservasi::route('/create'),
            'edit' => Pages\EditReservasi::route('/{record}/edit'),
        ];
    }
}
