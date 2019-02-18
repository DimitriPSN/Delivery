<?php
namespace Ws\Delivery\Client;

use GuzzleHttp\Client;

class PositionClient extends Client
{
    public function getPosition(string $parcelNumber) : array
    {
        $response = $this->get(sprintf(
            '/positions/%s',
            $parcelNumber
        ));

        $response = (string)$response->getBody();
        return json_decode($response, true);
    }

    public function addPosition($data) : array
    {
        $response = $this->post('/new', array(
            'form_params' => array(
                'parcelNumber' => $data->parcelNumber,
                'latitude' => $data->latitude,
                'longitude' => $data->longitude
            )
        ));

        $response = (string)$response->getBody();
        return json_decode($response, true);
    }
}
