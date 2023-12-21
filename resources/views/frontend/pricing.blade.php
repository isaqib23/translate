@extends('frontend.layout.app')
@section('content')
<style>
        body {
                    background-color: #e9ecef; /* Bootstrap's background color for light theme */
                    font-family: 'Arial', sans-serif;
                }
                .price-table {
                    margin-bottom: 20px;
                }
                .price-table-header {
                    background-color: #003366; /* Dark blue background */
                    color: #ffffff;
                    padding: 1rem 1.5rem;
                    font-size: 1.25rem;
                }
                .price-table-row {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 1rem 1.5rem;
                        border-radius: 39px;
                        margin-bottom: 20px;
                }

                .price-table-row .service {
                    color: #ffffff; /* Dark blue text */
                    font-weight: bold;
                    width: 60%
                }
                .price-table-row .price {
                    color: #ffffff; /* Bootstrap primary color */
                    font-weight: bold;
                }
                .highlight {
                    background: rgb(20,0,255);
                    background: linear-gradient(90deg, rgba(20,0,255,1) 32%, rgba(106,94,255,1) 100%);
                    color: #ffffff;
                }
    </style>
<div class="container">
        <div class="price-table">
            <h1 class="text-center" style="margin-bottom: 20px">
                Services and Prices
            </h1>
            <div class="price-table-row highlight">
                <div class="service">Normal Translation</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">25 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Urgent Normal Translation</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">40 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Legal Translation</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">35 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Urgent Legal Translation</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">50 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Medical Report</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">60 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Urgent Medical Report</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">80 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Driver License</div>
                <div class="price"></div>
                <div class="price">230 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">All Types of certifications
             (marriage, Birth, Degree, Etc.)</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">60 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Translation and drafting of
            Affidavits and Mercy Letters & NOC</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">50 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Translation and drafting of
            Special P.O.A  and Legal Notices</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">250 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Translation and drafting of
            GPOA of Attorney</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">300 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Translation and drafting of
            MOA  and Will</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">500 AED</div>
            </div>
            <div class="price-table-row highlight">
                <div class="service">Translation and drafting of
            Memorandum of Amendment</div>
                <div class="price">1 page or (250 Words)</div>
                <div class="price">50 AED</div>
            </div>


        </div>
    </div>
@endsection
