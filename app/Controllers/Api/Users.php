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
        // Reglas de validación para el nombre del cliente
        $validationRules = [
            'usuario' => [
                'label' => 'nombre de usuario',
                'rules' => 'required|is_unique[users.usuario]',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                    'is_unique' => 'El {field} ya existe en la base de datos.'
                ]
            ],
            'perfil' => [
                'label' => 'perfil de usuario',
                'rules' => 'required',
                'errors' => [
                    'required' => 'El campo {field} es obligatorio.',
                ]
            ]
        ];

        // Validar los datos del formulario
        if (!$this->validate($validationRules)) {
            return $this->fail(['errors' => $this->validator->getErrors()]);
        }

        // Crear una nueva entidad de cliente
        $entity = new \App\Entities\Users();
        $entity->fill($this->request->getPost());

        // Guardar los datos del cliente
        if (!$this->model->save($entity)) {
            return $this->failValidationErrors($this->model->validator->getErrors());
        }

        // Obtener el ID del cliente recién insertado
        $lastInsertedId = $this->model->db->insertID();

        // Obtener los datos del cliente recién insertado
        $data = $this->model->where('id', $lastInsertedId)->first();

        // Obtener el archivo de foto cargado por el usuario
        $photo = $this->request->getFile('foto');

        // Verificar si se ha cargado una nueva foto
        if ($photo->isValid() && !$photo->hasMoved()) {
            // Obtener la ruta de la foto actual del cliente (suponiendo que se almacena en la base de datos)
            $currentPhotoPath = $this->model->getCurrentPhotoPath($lastInsertedId); // Reemplaza con la lógica real para obtener la ruta

            // Verificar si el cliente tiene una foto actual en el servidor
            $directoryPath = ROOTPATH . 'public/uploads/';
            $filePath = $directoryPath . $currentPhotoPath;

            if (!empty($currentPhotoPath) && file_exists($filePath)) {
                // Eliminar la foto actual del servidor
                unlink($filePath);
            }

            // Generar un nombre único para la nueva foto (puedes usar tu lógica para nombrar la foto)
            $newPhotoName = $photo->getRandomName();

            // Mover la nueva foto al directorio de subida
            $photo->move($directoryPath, $newPhotoName);

            $newFilePath = $directoryPath . $newPhotoName;
            // Cargar la imagen utilizando la librería de manipulación de imágenes
            $image = \Config\Services::image()
                ->withFile($newFilePath)
                ->fit(800, 800, 'center') // Redimensionar y recortar a 800x800
                ->save($newFilePath); // Sobrescribir la imagen original con el nuevo tamaño

            // Actualizar la ruta de la foto en la base de datos para el cliente (suponiendo que tengas un modelo para actualizar)
            // Reemplaza con la lógica real para actualizar la ruta de la foto
            $this->model->updatePhotoPath($lastInsertedId, $newPhotoName); // Utiliza tu lógica real para actualizar la ruta
        }

        // Responder con los datos del cliente creado
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
            'usuario' => "required|is_unique[users.usuario,id,$id]",
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
        try {
            // Buscar el usuario por su ID
            if (!$data = $this->model->find($id)) {
                return $this->fail('El usuario no existe.'); // Mensaje si el usuario no se encuentra
            }

            // Obtener la ruta de la foto actual del usuario (suponiendo que se almacena en la base de datos)
            $currentPhotoPath = $this->model->getCurrentPhotoPath($id); // Reemplaza con la lógica real para obtener la ruta

            // Verificar si el usuario tiene una foto actual en el servidor y eliminarla si existe
            $directoryPath = ROOTPATH . 'public/uploads/';
            $filePath = $directoryPath . $currentPhotoPath;

            if (!empty($currentPhotoPath) && file_exists($filePath)) {
                unlink($filePath); // Eliminar la foto actual del servidor
            }

            // Eliminar al usuario
            $this->model->delete($id);

            // Responder con un mensaje de éxito
            return $this->respondDeleted([
                'message' => 'usuario eliminado correctamente.',
                'data' => $data // Puedes devolver los datos del usuario eliminado si es necesario
            ]);
        } catch (\Exception $e) {
            // Manejar errores del servidor
            return $this->failServerError('Error interno del servidor', $e->getMessage());
        }
    }
}
