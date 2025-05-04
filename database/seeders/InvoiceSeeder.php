<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::create([
            'invoice_number' => 'RCX-02/INV/013/2025',
            'invoice_date' => '2025-03-02',
            'client_name' => 'INDONESIAN CONFERENCE ON RELIGION AND PEACE (ICRP)',
            'client_address' => "Jl. Cempaka Putih Barat XXI No.34 5,\nRT.5/RW.12, Cemp. Putih Bar., Kec. Cemp.\nPutih, Kota Jakarta Pusat, Daerah Khusus\nIbukota Jakarta 10520",
            'services' => [
                [
                    'description' => 'Pembayaran Kedua',
                    'amount' => 1762500
                ]
            ],
            'total_amount' => 1762500,
            'account_name' => 'ZACHRAN RAZENDRA R',
            'bank_name' => 'Bank Mandiri',
            'account_number' => '1660005081567',
            'company_address' => 'Graha Dirgantara, J. Raya Protokol Halim Perdanakusuma No.8 2nd Floor Unit H, Halim Perdana Kusumah, Kec Makasar, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13610',
            'company_phone' => '0822 9814 1940',
            'company_email' => 'info@recodex.id',
            'company_website' => 'www.recodex.id',
            'is_paid' => false,
        ]);

        Invoice::create([
            'invoice_number' => 'RCX-01/INV/005/2025',
            'invoice_date' => '2025-02-15',
            'client_name' => 'PT Teknologi Maju Indonesia',
            'client_address' => "Jl. Sudirman No. 123,\nJakarta Selatan 12190",
            'services' => [
                [
                    'description' => 'Website Development',
                    'amount' => 5000000
                ],
                [
                    'description' => 'UI/UX Design',
                    'amount' => 3000000
                ]
            ],
            'total_amount' => 8000000,
            'account_name' => 'ZACHRAN RAZENDRA R',
            'bank_name' => 'Bank Mandiri',
            'account_number' => '1660005081567',
            'company_address' => 'Graha Dirgantara, J. Raya Protokol Halim Perdanakusuma No.8 2nd Floor Unit H, Halim Perdana Kusumah, Kec Makasar, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13610',
            'company_phone' => '0822 9814 1940',
            'company_email' => 'info@recodex.id',
            'company_website' => 'www.recodex.id',
            'is_paid' => false,
        ]);
    }
}
