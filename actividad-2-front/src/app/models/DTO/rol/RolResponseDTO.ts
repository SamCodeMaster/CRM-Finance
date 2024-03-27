import { RolDTO } from "./RolDTO";

export class RolResponseDTO{
    statusCode!: number;
    message!: string;
    data: RolDTO = new RolDTO();

    constructor(){
        
    }
}