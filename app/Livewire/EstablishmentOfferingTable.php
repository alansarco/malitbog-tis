<?php

namespace App\Livewire;

use App\Enums\RoleEnum;
use App\Models\Offering;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
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

final class EstablishmentOfferingTable extends PowerGridComponent
{
  use WithExport;

  public string $tableName = 'EstablishmentOfferingTable';

  public function setUp(): array
  {
    return [
      Header::make()->showSearchInput(),
      Footer::make()
        ->showPerPage()
        ->showRecordCount(),
    ];
  }

  public function datasource(): Builder
  {
    if ((request()->establishment || Session::has('establishmentId')) && !str_contains(url()->current(), 'offerings')) {
      Session::flash('establishmentId', request()->establishment?->id ?? Session::get('establishmentId'));
    }

    if (auth()->user()->role->name == RoleEnum::OWNER->value) {
      Session::flash('establishmentId', auth()->user()->establishment->id);
    }

    return Offering::query()->when(Session::has('establishmentId'), function ($query) {
      $query->where('establishment_id', Session::get('establishmentId'));
    });
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
  {
    return PowerGrid::fields()
      ->add('image', function ($item) {
        $path = $item->path ? str_replace('public', '/storage', $item->path) : 'https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg';
        return '<img class="" height="100px" width="180px" src="' . asset("{$path}") . '">';
      })
      ->add('establishment', fn($offer) => e($offer->establishment->name))
      ->add('name')
      ->add('path')
      ->add('price');
  }

  public function columns(): array
  {
    return [

      Column::make('Image', 'image'),
      Column::make('Establishment', 'establishment'),
      Column::make('Name', 'name')
        ->sortable()
        ->searchable(),

      Column::make('Price', 'price')
        ->sortable()
        ->searchable(),

      Column::action('Action')
    ];
  }

  public function filters(): array
  {
    return [];
  }

  #[\Livewire\Attributes\On('edit')]
  public function edit($rowId): void
  {
    $this->js('alert(' . $rowId . ')');
  }

  #[\Livewire\Attributes\On('deleteOffer')]
  public function deleteOffer($rowId): void
  {
    $offer = Offering::find($rowId);
    $offer->delete();
  }

  public function actions(Offering $row): array
  {
    return [

      Button::add('edit')
        ->slot('Edit')
        ->class('btn btn-warning')
        ->route('offerings.edit', ['offering' => $row->id], '_blank'),

      Button::add('delete')
        ->slot('Delete')
        ->id()
        ->class('btn btn-danger')
        ->confirm('Do you wish to delete this record?')
        ->dispatch('deleteOffer', ['rowId' => $row->id])
    ];
  }

  /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
