<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Access implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        //
               // Verifica si se proporciona un argumento y si es un array o una cadena
               if ($arguments !== null) {
                $profiles = is_array($arguments) ? $arguments : [$arguments];
    
                // Lógica para verificar el acceso según los perfiles proporcionados
                // Verifica si el usuario actual tiene un perfil válido para acceder al endpoint
                // Este es solo un ejemplo, debes implementar tu propia lógica de verificación de perfiles
                $currentUserProfile = session('perfil'); // Obten el perfil del usuario actual
    
                if (!in_array($currentUserProfile, $profiles)) {
                    // El usuario no tiene acceso, puedes redirigir, mostrar un error o realizar otra acción
                    // return Services::response()->setStatusCode(ResponseInterface::HTTP_FORBIDDEN);
                    return redirect()->to(base_url('/')); // Redirecciona a la ruta base "/"
                }
            }
    
            return $request;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
