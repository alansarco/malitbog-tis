<?php

namespace App\Livewire;

use App\Models\Event;
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

final class EstablishmentEventTable extends PowerGridComponent
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
    return Event::query();
  }

  public function relationSearch(): array
  {
    return [];
  }

  public function fields(): PowerGridFields
  {
    return PowerGrid::fields()
      ->add('establishment', fn($event) => e($event->establishment->name))
      ->add('title')
      ->add('date')
      ->add('created_at');
  }

  public function columns(): array
  {
    return [
      Column::make('Establishment Name', 'establishment'),
      Column::make('Title', 'title'),
      Column::make('Date', 'date'),
      Column::make('Published Date', 'created_at'),

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

  #[\Livewire\Attributes\On('delete')]
  public function delete($rowId): void
  {
    $event = Event::find($rowId);
    $event->delete();
  }

  public function actions(Event $row): array
  {
    return [
      Button::add('edit')
        ->slot('Edit')
        ->class('btn btn-warning')
        ->route('events.edit', ['event' => $row->id]),

      Button::add('delete')
        ->slot('Delete')
        ->id()
        ->class('btn btn-danger')
        ->confirm('Do you wish to delete this record?')
        ->dispatch('delete', ['rowId' => $row->id])
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
