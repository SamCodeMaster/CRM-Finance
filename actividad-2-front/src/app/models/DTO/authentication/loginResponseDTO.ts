import { loginDTO } from "./loginDTO";

export class loginResponseDTO{
    statusCode!: number;
    message!: string;
    data: loginDTO = new loginDTO();

    constructor(){
        
    }
}