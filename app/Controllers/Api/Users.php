<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\Users';

    public function __construct()
    {
        //
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        try {
            return $this->respond([
                "data" => $this->model->findAll()
            ]);
        } catch (\Exception $e) {
            // Error Handling
            return $this->failServerError('Internal Server Error', $e);
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        try {
            return $this->respond([ // Response
                "data" => $this->model->find($id) // Find
            ]);
        } catch (\Exception $e) {
            // Error Handling
            return $this->failServerError('Internal Server Error', $e);
        }
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        $validationRule = [
            'name' => "required|is_unique[clientes.nombre_completo]",
        ];
        if (!$this->validate($validationRule)) {
            $this->fail(['errors' => $this->validator->getErrors()]);
        }
        $entity = new \App\Entities\Users();
        $entity->fill($this->request->getPost());

        if (!$this->model->save($entity))
            return $this->failValidationErrors($this->model->validator->getErrors());

        $data = $this->model->where('id', $this->model->db->insertID())->first();

        return $this->respondCreated([
            'message' => 'created',
            'data' => $data
        ]);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        // Define la regla de validación para el campo "nombre_completo".
        $validationRules = [
            'name' => "required|is_unique[clientes.nombre_completo,id,$id]",
        ];

        // Valida la entrada del usuario.
        if (!$this->validate($validationRules)) {
            return $this->fail(['errors' => $this->validator->getErrors()]);
        }

        // Busca el registro a actualizar en la base de datos.
        $entity = $this->model->find($id);

        // Verifica si el registro existe.
        if (!$entity) {
            return $this->failNotFound('No se encontró el registro especificado.');
        }

        // Actualiza el registro con los datos enviados por el usuario.
        $entity->fill($this->request->getRawInput());

        // Verifica si se realizaron cambios en el registro.
        if ($entity->hasChanged())
            // Intenta guardar el registro actualizado en la base de datos.
            if (!$this->model->save($entity))
                return $this->failValidationErrors($this->model->validator->getErrors());

        // Recupera el registro actualizado de la base de datos.
        $data = $this->model->find($id);

        // Retorna una respuesta HTTP 200 OK con el registro actualizado.
        return $this->respondUpdated([
            'message' => 'Registro actualizado exitosamente.',
            'data' => $data
        ]);
    }


    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        try {
            // Find
            if (!$data = $this->model->find($id))
                return $this->fail('doesn\'t exist!');
            // Delete
            $this->model->delete($id);
            // Response
            return $this->respondDeleted([
                'message' => 'deleted',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            // Error Handling
            return $this->failServerError('Internal Server Error', $e->getMessage());
        }
    }
}
