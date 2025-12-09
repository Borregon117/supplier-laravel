<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
// Source - https://stackoverflow.com/a
// Posted by Salim Djerbouh, modified by community. See post 'Timeline' for change history
// Retrieved 2025-12-05, License - CC BY-SA 4.0
use Illuminate\Support\Facades\Validator;


class SupplierController extends Controller
{
    /**
     * Obtenemos toda la coleccion de los proveedores del DB
     *
     * Retorna un JSON con la coleccion de proveedores o
     * un mensaje de error si no existen registros
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $suppliers = Supplier::all();
        if ($suppliers->isEmpty()) {

            return response()->json([
                'status' => 'error',
                'message' => 'No se encontraron proveedores'
            ], 404);
        }
        return response()->json($suppliers, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required',
            'supplier_description' => 'required',
            'supplier_service' => 'required',
            'supplier_address' => 'required',
            'supplier_contact' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos incorrectos',
                'error' => $validator->errors()
            ], 400);
        }

        $supplier = Supplier::create([
            'supplier_name' => $request->supplier_name,
            'supplier_description' => $request->supplier_description,
            'supplier_service' => $request->supplier_service,
            'supplier_address' => $request->supplier_address,
            'supplier_contact' => $request->supplier_contact,
        ]);
        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al crear proveedor'
            ], 500);
        }
        return response()->json($supplier, 200);
    }

    public function show(string $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Proveedor no encontrado',
            ], 404);
        }
        return response()->json($supplier, 200);
    }

    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'No se encontró el proveedor',
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'supplier_name' => 'required',
            'supplier_description' => 'required',
            'supplier_service' => 'required',
            'supplier_address' => 'required',
            'supplier_contact' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al validar los datos',
                'errors' => $validator->errors()
            ], 400);
        }
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_description = $request->supplier_description;
        $supplier->supplier_service = $request->supplier_service;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->supplier_contact = $request->supplier_contact;

        $supplier->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Proveedor actualizado con exito',
            'data' => '$supplier'
        ], 200);
    }


    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Proveedor no encontrado'
            ], 404);
        }
        $supplier->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Proveedor eliminado'
        ], 200);
    }

    public function patch(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Proveedor no encontrado'
            ], 404);
        }
        $validator = Validator::make($request->all(), [
            'supplier_name' => '',
            'supplier_description' => '',
            'supplier_service' => '',
            'supplier_address' => '',
            'supplier_contact' => ''
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al validar los datos',
                'errors' => $validator->errors()
            ], 400);
        }
        if ($request->has('supplier_name')) {
            $supplier->supplier_name = $request->supplier_name;
        }
        if ($request->has('supplier_description')) {
            $supplier->supplier_description = $request->supplier_description;
        }
        if ($request->has('supplier_service')) {
            $supplier->supplier_service = $request->supplier_service;
        }
        if ($request->has('supplier_address')) {
            $supplier->supplier_address = $request->supplier_address;
        }
        if ($request->has('supplier_contact')) {
            $supplier->supplier_contact = $request->supplier_contact;
        }

        $supplier->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Proveedor actualizado parcialmente con exito',
            'data' => '$supplier',
        ], 200);
    }
}
