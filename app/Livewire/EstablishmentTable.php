<?php

namespace App\Livewire;

use App\Enums\StatusEnum;
use App\Models\Establishment;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Facades\Rule;

final class EstablishmentTable extends PowerGridComponent
{
  use WithExport;

  public function setUp(): array
  {
    $this->showCheckBox();

    return [
      Header::make()->showSearchInput(),
      Footer::make()
        ->showPerPage()
        ->showRecordCount(),
    ];
  }

  public function datasource(): Builder
  {
    return Establishment::query()->with('owner');
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
{
    return PowerGrid::fields()
        ->add('owner_name', fn($establishment) => e($establishment?->owner?->name ?? 'N/A'))
        ->add('name')
        ->add('description')
        ->add('address')
        ->add('geolocation', fn($establishment) => e(($establishment->geolocation_longitude ?? 'N/A') . ' - ' . ($establishment->geolocation_latitude ?? 'N/A')))
        ->add('mode_of_access')
        ->add('contact_number')
        ->add('business_type_id', fn($establishment) => e($establishment->businessType->name ?? 'N/A'))
        ->add('status', fn($establishment) => e(Str::title($establishment->status ?? 'N/A')));
}


  public function columns(): array
  {
    return [
      Column::make('Owner', 'owner_name'),
      Column::make('Name', 'name')
        ->sortable()
        ->searchable(),

      Column::make('Description', 'description')
        ->sortable()
        ->searchable(),

      Column::make('Address', 'address')
        ->sortable()
        ->searchable(),

      Column::make('Geolocation', 'geolocation')
        ->sortable()
        ->searchable(),

      Column::make('Mode of access', 'mode_of_access')
        ->sortable()
        ->searchable(),

      Column::make('Contact number', 'contact_number')
        ->sortable()
        ->searchable(),

      Column::make('Business Type', 'business_type_id'),
      Column::make('Status', 'status')
        ->sortable()
        ->searchable(),

      Column::action('Action')
    ];
  }

  public function filters(): array
  {
    return [
      Filter::select('owner_name', 'user_id')
        ->dataSource(User::whereNot('role_id', 1)->get())
        ->optionLabel('name')
        ->optionValue('id'),
      Filter::inputText('name'),
      Filter::inputText('description'),
      Filter::inputText('address'),
      Filter::inputText('mode_of_access'),
      Filter::inputText('business_type_id'),
      Filter::select('status', 'status')
        ->dataSource(collect([
          ['name' => 'Active'],
          ['name' => 'Inactive']
        ]))
        ->optionLabel('name')
        ->optionValue('name')
    ];
  }
  public function confirmDeleteEstablishment($rowId)
  {
      $this->emit('showDeleteConfirmation', $rowId);  // Emit the event to Blade to trigger SweetAlert
  }

  #[\Livewire\Attributes\On('edit')]
  public function edit($rowId): void
  {
    $this->js('alert(' . $rowId . ')');
  }

  #[\Livewire\Attributes\On('deleteEstablishment')]
  public function deleteEstablishment($rowId): void
  {
    $establishment = Establishment::where('id', $rowId)->delete();
    if ($establishment) {
        $this->dispatch('establishmentDeleted');  // Notify frontend that deletion was successful
    }
    else {
      $this->dispatch('establishmentNotDeleted'); 
    }
  }

  public function actions(Establishment $row): array
  {
    return [
      Button::add('view')
        ->slot('View')
        ->class('btn btn-info btn-sm')
        ->route('establishments.show', ['establishment' => $row]),

      Button::add('edit')
        ->slot('Edit')
        ->class('btn btn-success btn-sm')
        ->route('establishments.edit', ['establishment' => $row->id], '_blank'),

      Button::add('delete')
        ->slot('Delete')
        ->class('btn btn-danger btn-sm')
        ->dispatch('confirmDeleteEstablishment', ['rowId' => $row->id])
        
    ];
  }


  public function actionRules($row): array
  {
    return [
      // Hide button edit for ID 1
      Rule::button('edit')
        ->when(fn($row) => $row->status === StatusEnum::INACTIVE->value)
        ->hide(),

      Rule::button('delete')
        ->when(fn($row) => $row->status === StatusEnum::INACTIVE->value)
        ->hide(),
    ];
  }
}
