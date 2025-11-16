<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->extraAttributes(['novalidate' => true])
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->label('NIK')
                    ->required()
                    ->numeric()
                    ->rules(['digits_between:8,16'])
                    ->validationMessages([
                        'required' => 'NIK tidak boleh kosong',
                        'numeric' => 'NIK harus berupa angka',
                        'digits_between' => 'NIK harus terdiri dari 8 hingga 16 digit.',
                        'unique' => 'NIK sudah terdaftar.',
                    ])
                    ->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('full_name')
                    ->label('Nama lengkap')
                    ->required()
                    ->validationMessages([
                        'required' => 'Nama lengkap tidak boleh kosong',
                    ])
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->rules(['email:rfc,dns'])
                    ->validationMessages([
                        'required' => 'email tidak boleh kosong',
                        'email' => 'format email tidak valid',
                        'unique' => 'email sudah terdaftar.',
                    ])
                    ->unique(ignoreRecord: true),
                Forms\Components\Select::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['Laki-laki' => 'Laki-laki', 'P' => 'Perempuan'])
                    ->validationMessages([
                        'required' => 'Jenis kelamin tidak boleh kosong',
                    ])
                    ->required(),
                Forms\Components\Select::make('position')
                    ->label('Jabatan')
                    ->options(['Staff' => 'Staff', 'Admin' => 'Admin', 'Supervisor' => 'Supervisor', 'Manager' => 'Manager', 'Intern' => 'Intern'])
                    ->validationMessages([
                        'required' => 'Jabatan tidak boleh kosong',
                    ])
                    ->required(),
                Forms\Components\Select::make('division')
                    ->label('Divisi')
                    ->options(['HRD' => 'HRD', 'Finance' => 'Finance', 'IT' => 'IT', 'Marketing' => 'Marketing', 'Operation' => 'Operating', 'GA' => 'GA'])
                    ->validationMessages([
                        'required' => 'Devisi tidak boleh kosong',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('joined_at')
                    ->label('Tanggal Bergabung')
                    ->validationMessages([
                        'required' => 'Tanggal bergabung tidak boleh kosong',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->rules(['nullable', 'digits_between:10,13'])
                    ->validationMessages([
                        'digits_between' => 'Nomor telepon harus 10–13 digit.',
                    ])
                    ->maxLength(255),
                Forms\Components\DatePicker::make('birth_date')
                    ->label('Tanggal Lahir')
                    ->nullable(),
                Forms\Components\Textarea::make('address')
                    ->label('Alamat')
                    ->columnSpanFull()
                    ->nullable(),
                Forms\Components\Select::make('status_employee')
                    ->label('Status Karyawan')
                    ->options(['Aktif' => 'Aktif', 'Non-aktif' => 'Non-aktif', 'Resign' => 'Resign', 'Cuti' => 'Cuti'])
                    ->nullable(),
                Forms\Components\TextInput::make('base_salary')
                    ->label('Gaji Pokok')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('position'),
                Tables\Columns\TextColumn::make('division'),
                Tables\Columns\TextColumn::make('joined_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('birth_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status_employee'),
                Tables\Columns\TextColumn::make('base_salary')
                    ->money('idr', true)
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
