<?php

namespace App\Http\Controllers;

use App\Models\Documentverify;
use Illuminate\Http\Request;

class VerifiedDocumentController extends Controller
{
    private DocumentVerify $documentVerify;

    public function __construct(Documentverify $documentVerify)
    {
        $this->documentVerify = $documentVerify;
    }

    public function show(Request $request, $id)
    {
        try {
            $document = $this->documentVerify->where('token_valid', $id)->first();

            if (!$document) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Document not found or token is invalid.'
                ], 404);
            }

            return view('verified_document.show', compact('document'));

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the document verification status.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
