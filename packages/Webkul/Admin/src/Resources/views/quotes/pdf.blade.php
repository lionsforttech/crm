<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html
    lang="{{ $locale = app()->getLocale() }}"
    dir="{{ in_array($locale, ['fa', 'ar']) ? 'rtl' : 'ltr' }}"
>
    <head>
        <!-- meta tags -->
        <meta
            http-equiv="Cache-control"
            content="no-cache"
        >

        <meta
            http-equiv="Content-Type"
            content="text/html; charset=utf-8"
        />

        @php
            if ($locale == 'en') {
                $fontFamily = [
                    'regular' => 'DejaVu Sans',
                    'bold'    => 'DejaVu Sans',
                ];
            }  else {
                $fontFamily = [
                    'regular' => 'Arial, sans-serif',
                    'bold'    => 'Arial, sans-serif',
                ];
            }

            if (in_array($locale, ['ar', 'fa', 'tr'])) {
                $fontFamily = [
                    'regular' => 'DejaVu Sans',
                    'bold'    => 'DejaVu Sans',
                ];
            }
        @endphp

        <!-- lang supports inclusion -->
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: {{ $fontFamily['regular'] }};
            }

            body {
                font-size: 10px;
                color: #091341;
                font-family: "{{ $fontFamily['regular'] }}";
            }

            b, th {
                font-family: "{{ $fontFamily['bold'] }}";
            }

            .page-content {
                padding: 12px;
                padding-bottom: 90px; /* add enough space for the footer */
            }

            .page-header {
                border-bottom: 1px solid #E9EFFC;
                text-align: center;
                font-size: 24px;
                text-transform: uppercase;
                color: #000000;
                padding: 24px 0;
                margin: 0;
            }

            .logo-container {
                position: absolute;
                top: 20px;
                left: 20px;
            }

            .logo-container.rtl {
                left: auto;
                right: 20px;
            }

            .logo-container img {
                max-width: 100%;
                height: auto;
            }

            .page-header b {
                display: inline-block;
                vertical-align: middle;
            }

            .small-text {
                font-size: 7px;
            }

            table {
                width: 100%;
                border-spacing: 1px 0;
                border-collapse: separate;
                margin-bottom: 16px;
            }
            
            table thead th {
                background-color: #00000007;
                color: #000000;
                padding: 6px 18px;
                text-align: left;
            }

            table.rtl thead tr th {
                text-align: right;
            }

            table tbody td {
                padding: 9px 18px;
                border-bottom: 1px solid #E9EFFC;
                text-align: left;
                vertical-align: top;
            }

            table.rtl tbody tr td {
                text-align: right;
            }

            .summary {
                width: 100%;
                display: inline-block;
            }

            .summary table {
                float: right;
                width: 250px;
                padding-top: 5px;
                padding-bottom: 5px;
                background-color: #00000007;
                white-space: nowrap;
            }

            .summary table.rtl {
                width: 280px;
            }

            .summary table.rtl {
                margin-right: 480px;
            }

            .summary table td {
                padding: 5px 10px;
            }

            .summary table td:nth-child(2) {
                text-align: center;
            }

            .summary table td:nth-child(3) {
                text-align: right;
            }

            .footer-company-info {
                position: absolute;
                bottom: 20px;
                left: 0;
                padding:  20px;
                width: 100%;
                font-size: 10px 10px;
                color: #555;
                border-top: 1px solid #E9EFFC;
            }

            .page {
                position: relative;
                min-height: 1000px; /* adjust as needed for your page size */
            }
        </style>
    </head>
    <body dir="{{ $locale }}">
        <div class="page">
            <!-- Header -->
            <div class="page-header" style="padding: 12px;">
                <div class="container">
                    <img src="{{ public_path('admin/build/assets/logo.png') }}" alt="Logo" style="max-height: 100px;">
                </div>
            </div>

            <div class="page-content">
                <!-- Invoice Information -->
                <table class="{{ app()->getLocale   () }}">
                    <tbody>
                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.quotes.index.pdf.quote-id'): 
                                </b>

                                <span>
                                    #{{ $quote->id }}
                                </span>
                            </td>

                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.quotes.index.pdf.person'):
                                </b>

                                <span>
                                    {{ $quote->person->name }}
                                </span>
                            </td>
                            
                        </tr>

                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.quotes.index.pdf.sales-person'): 
                                </b>

                                <span>
                                    {{ $quote->user->name }}
                                </span>
                            </td>

                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.quotes.index.pdf.subject'):
                                </b>

                                <span>
                                    {{ $quote->subject }}
                                </span>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.quotes.index.pdf.date'):
                                </b>

                                <span>
                                    {{ core()->formatDate($quote->created_at, 'd-m-Y') }}
                                </span>
                            </td>

                            {{-- <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.leads.common.contact.organization'):
                                </b>

                                <span>
                                    {{ $quote->attribute->organization ?? '-' }}
                                </span>
                            </td> --}}
                            

                        </tr>

                        <tr>
                            <td style="width: 50%; padding: 2px 18px;border:none;">
                                <b>
                                    @lang('admin::app.quotes.index.pdf.expired-at'):
                                </b>

                                <span>
                                    {{ core()->formatDate($quote->expired_at, 'd-m-Y') }}
                                </span>
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>                

                <!-- Items -->
                <div class="items">
                    <table class="{{ app()->getLocale   () }}">
                        <thead>
                            <tr>
                                <th>
                                    @lang('admin::app.quotes.index.pdf.sku')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.product-name')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.price')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.quantity')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.amount')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.discount')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.tax')
                                </th>

                                <th>
                                    @lang('admin::app.quotes.index.pdf.grand-total')
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($quote->items as $item)
                                <tr>
                                    <td>{{ $item->sku }}</td>

                                    <td>
                                        {{ $item->name }}
                                    </td>

                                    <td>{!! core()->formatBasePrice($item->price, true) !!}</td>

                                    <td class="text-center">{{ $item->quantity }}</td>

                                    <td class="text-center">{!! core()->formatBasePrice($item->total, true) !!}</td>

                                    <td class="text-center">{!! core()->formatBasePrice($item->discount_amount, true) !!}</td>

                                    <td class="text-center">{!! core()->formatBasePrice($item->tax_amount, true) !!}</td>
                                    
                                    <td class="text-center">{!! core()->formatBasePrice($item->total + $item->tax_amount - $item->discount_amount, true) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

               <!-- Summary Table -->
                <div class="summary">
                    <table class="{{ app()->getLocale   () }}">
                        <tbody>
                            <tr>
                                <td>@lang('admin::app.quotes.index.pdf.sub-total')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($quote->sub_total, true) !!}</td>
                            </tr>
        
                            <tr>
                                <td>@lang('admin::app.quotes.index.pdf.tax')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($quote->tax_amount, true) !!}</td>
                            </tr>
        
                            <tr>
                                <td>@lang('admin::app.quotes.index.pdf.discount')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($quote->discount_amount, true) !!}</td>
                            </tr>
        
                            <tr>
                                <td>@lang('admin::app.quotes.index.pdf.adjustment')</td>
                                <td>-</td>
                                <td>{!! core()->formatBasePrice($quote->adjustment_amount, true) !!}</td>
                            </tr>
        
                            <tr>
                                <td><strong>@lang('admin::app.quotes.index.pdf.grand-total')</strong></td>
                                <td><strong>-</strong></td>
                                <td><strong>{!! core()->formatBasePrice($quote->grand_total, true) !!}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="footer-company-info">
            <div><b>Company Address:</b> Office No. 103, Second Floor, Talary Bayan Building, Opposite of Dentist Hospital, Muzafarai Street, Erbil, Iraq</div>
            <div><b>Phone:</b> +964 750 316 32 30 &nbsp; | &nbsp; +964 777 938 00 93 </div>
            <div><b>Website:</b> <a href="https://www.lionsfortco.com" style="color:#555;text-decoration:none;">www.lionsfortco.com</a></div>
        </div>
    </body>
</html>
