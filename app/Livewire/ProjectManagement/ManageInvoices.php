<?php

namespace App\Livewire\ProjectManagement;

use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

class ManageInvoices extends Component
{
    use WithPagination;

    // Form properties
    public $invoiceId;
    public $invoice_number;
    public $invoice_date;
    public $client_name;
    public $client_address;
    public $services = [];
    public $total_amount = 0;
    public $account_name;
    public $bank_name;
    public $account_number;
    public $company_address;
    public $company_phone;
    public $company_email;
    public $company_website;
    public $is_paid = false;

    // Service item management
    public $new_service_description = '';
    public $new_service_amount = 0;

    // UI state
    public $isOpen = false;
    public $confirmingInvoiceDeletion = false;
    public $invoiceIdBeingDeleted;

    // Search and filter
    public $search = '';
    public $sortField = 'invoice_date';
    public $sortDirection = 'desc';
    public $filter_status = '';

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'invoice_date'],
        'sortDirection' => ['except' => 'desc'],
        'filter_status' => ['except' => ''],
    ];

    protected $rules = [
        'invoice_number' => 'required|string|max:255',
        'invoice_date' => 'required|date',
        'client_name' => 'required|string|max:255',
        'client_address' => 'required|string',
        'services' => 'required|array|min:1',
        'services.*.description' => 'required|string',
        'services.*.amount' => 'required|numeric|min:0',
        'total_amount' => 'required|numeric|min:0',
        'account_name' => 'required|string|max:255',
        'bank_name' => 'required|string|max:255',
        'account_number' => 'required|string|max:255',
        'company_address' => 'required|string',
        'company_phone' => 'required|string|max:255',
        'company_email' => 'required|email|max:255',
        'company_website' => 'required|string|max:255',
        'is_paid' => 'boolean',
    ];

    public function mount()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->reset([
            'invoiceId',
            'invoice_number',
            'invoice_date',
            'client_name',
            'client_address',
            'services',
            'total_amount',
            'account_name',
            'bank_name',
            'account_number',
            'company_address',
            'company_phone',
            'company_email',
            'company_website',
            'is_paid',
            'new_service_description',
            'new_service_amount'
        ]);

        // Set default values
        $this->invoice_date = date('Y-m-d');
        $this->is_paid = false;
        $this->services = [];
        $this->total_amount = 0;

        // Generate a new invoice number
        $latestInvoice = Invoice::latest()->first();
        $year = date('Y');
        $month = date('m');
        $count = $latestInvoice ? intval(substr($latestInvoice->invoice_number, -3)) + 1 : 1;
        $this->invoice_number = 'RCX-' . $month . '/INV/' . str_pad($count, 3, '0', STR_PAD_LEFT) . '/' . $year;

        // Set default company information
        $this->account_name = 'ZACHRAN RAZENDRA R';
        $this->bank_name = 'Bank Mandiri';
        $this->account_number = '1660005081567';
        $this->company_address = 'Graha Dirgantara, J. Raya Protokol Halim Perdanakusuma No.8 2nd Floor Unit H, Halim Perdana Kusumah, Kec Makasar, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13610';
        $this->company_phone = '0822 9814 1940';
        $this->company_email = 'info@recodex.id';
        $this->company_website = 'www.recodex.id';

        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $this->invoiceId = $id;
        $this->invoice_number = $invoice->invoice_number;
        $this->invoice_date = $invoice->invoice_date->format('Y-m-d');
        $this->client_name = $invoice->client_name;
        $this->client_address = $invoice->client_address;
        $this->services = $invoice->services;
        $this->total_amount = $invoice->total_amount;
        $this->account_name = $invoice->account_name;
        $this->bank_name = $invoice->bank_name;
        $this->account_number = $invoice->account_number;
        $this->company_address = $invoice->company_address;
        $this->company_phone = $invoice->company_phone;
        $this->company_email = $invoice->company_email;
        $this->company_website = $invoice->company_website;
        $this->is_paid = $invoice->is_paid;

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date,
            'client_name' => $this->client_name,
            'client_address' => $this->client_address,
            'services' => $this->services,
            'total_amount' => $this->total_amount,
            'account_name' => $this->account_name,
            'bank_name' => $this->bank_name,
            'account_number' => $this->account_number,
            'company_address' => $this->company_address,
            'company_phone' => $this->company_phone,
            'company_email' => $this->company_email,
            'company_website' => $this->company_website,
            'is_paid' => $this->is_paid,
        ];

        // Create or update invoice
        if ($this->invoiceId) {
            $invoice = Invoice::findOrFail($this->invoiceId);
            $invoice->update($data);
            session()->flash('message', 'Invoice updated successfully.');
        } else {
            Invoice::create($data);
            session()->flash('message', 'Invoice created successfully.');
        }

        $this->closeModal();
        $this->resetInputFields();
    }

    public function confirmInvoiceDeletion($id)
    {
        $this->confirmingInvoiceDeletion = true;
        $this->invoiceIdBeingDeleted = $id;
    }

    public function deleteInvoice()
    {
        $invoice = Invoice::findOrFail($this->invoiceIdBeingDeleted);
        $invoice->delete();
        $this->confirmingInvoiceDeletion = false;
        session()->flash('message', 'Invoice deleted successfully.');
    }

    public function cancelDelete()
    {
        $this->confirmingInvoiceDeletion = false;
        $this->invoiceIdBeingDeleted = null;
    }

    // Service management
    public function addService()
    {
        if (empty($this->new_service_description) || $this->new_service_amount <= 0) {
            return;
        }

        $this->services[] = [
            'description' => $this->new_service_description,
            'amount' => $this->new_service_amount,
        ];

        $this->calculateTotal();
        $this->new_service_description = '';
        $this->new_service_amount = 0;
    }

    public function removeService($index)
    {
        unset($this->services[$index]);
        $this->services = array_values($this->services);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total_amount = 0;
        foreach ($this->services as $service) {
            $this->total_amount += $service['amount'];
        }
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function render()
    {
        $invoices = Invoice::query()
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $q->where('invoice_number', 'like', '%' . $this->search . '%')
                      ->orWhere('client_name', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filter_status !== '', function ($query) {
                return $query->where('is_paid', $this->filter_status === 'paid');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        return view('livewire.project-management.manage-invoices', [
            'invoices' => $invoices
        ]);
    }
}
