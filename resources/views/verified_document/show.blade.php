<x-layouts.app :title="'Certificate of Verification - ' . $document->title">
    <div class="min-h-screen bg-gray-100 flex justify-center items-start">
        <div class="bg-white rounded-[20px] shadow-2xl w-full max-w-4xl relative overflow-hidden border border-gray-200 mt-0">

            <!-- Watermark -->
            <div class="absolute inset-0 opacity-[0.05] flex items-center justify-center">
                <img src="{{ asset('images/logo-rejoso.png') }}" alt="Rejoso Logo" class="w-96">
            </div>

            <!-- Header -->
            <div class="text-center border-b border-gray-200 pb-6 pt-10 px-10 relative z-10">
                <img src="{{ asset('images/logo-rejoso.png') }}" alt="PT Rejoso Manis Indo" class="mx-auto w-28 mb-4">
                <h1 class="text-3xl font-bold tracking-wider text-[#004b23] uppercase">Certificate of Verification</h1>
                <p class="text-gray-600 text-sm mt-2">Issued and Digitally Verified by <span class="font-semibold">PT Rejoso Manis Indo</span></p>
                <div class="mt-4 inline-block px-6 py-1 bg-[#00733e] text-white text-xs font-semibold rounded-full uppercase tracking-wider shadow-md">
                    Verified & Authentic
                </div>
            </div>

            <!-- Body -->
            <div class="relative z-10 px-10 py-8 grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                <x-documents.info label="Document Title" :value="$document->title" />
                <x-documents.info label="Document Number" :value="$document->document_number" />
                <x-documents.info label="Type" :value="$document->type_doc" />
                <x-documents.info label="Owner" :value="$document->owner_name" />
                <x-documents.info label="Issuer Department" :value="$document->issuer_department" />
                <x-documents.info label="Issue Date" :value="\Carbon\Carbon::parse($document->issue_date)->format('d M Y')" />
                <x-documents.info label="Expiry Date" :value="$document->expiry_date ? \Carbon\Carbon::parse($document->expiry_date)->format('d M Y') : '-'" />

                <div class="col-span-2">
                    <p class="text-sm text-gray-500">Token Valid</p>
                    <p class="font-mono text-sm bg-gray-50 border border-gray-200 px-3 py-2 rounded">{{ $document->token_valid }}</p>
                </div>
            </div>

            <!-- Center Seal -->
            <div class="flex justify-center mt-6 mb-8 relative z-10">
                <div class="relative w-40 h-40 rounded-full flex items-center justify-center bg-emerald-50 shadow-md">
                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-emerald-700 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2l4 -4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                        </svg>
                        <span class="font-bold text-emerald-800 text-lg uppercase">Verified</span>
                        <p class="text-[10px] text-gray-500 mt-1">PT Rejoso Manis Indo</p>
                    </div>
                </div>
            </div>

            <!-- QR & Footer -->
            <div class="border-t border-gray-200 bg-gradient-to-r from-gray-50 to-emerald-50 py-8 px-10 flex flex-col md:flex-row justify-between items-center relative z-10">
                <div class="text-sm text-gray-600 mb-4 md:mb-0">
                    <p>Issued: {{ \Carbon\Carbon::parse($document->created_at)->format('d M Y H:i') }}</p>
                    <p>Last Updated: {{ \Carbon\Carbon::parse($document->updated_at)->format('d M Y H:i') }}</p>
                </div>

                <div class="flex flex-col items-center">
                    <div class="bg-white border border-gray-300 p-3 rounded-xl shadow-sm">
                        {!! QrCode::size(100)->generate(url()->current()) !!}
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Scan to Verify</p>
                </div>
            </div>

            <!-- Signature -->
            <div class="text-center py-6 relative z-10">
                <p class="text-gray-700 text-sm">Digitally Signed by</p>
                <p class="font-semibold text-[#004b23] text-lg mt-1">PT Rejoso Manis Indo Verification System</p>
                <p class="text-xs text-gray-500 mt-1">Rejoso, Blitar - East Java, Indonesia</p>
            </div>

        </div>
    </div>
</x-layouts.app>
