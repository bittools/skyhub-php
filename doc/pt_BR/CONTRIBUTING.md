# Manual de Contribuição

Se você deseja contribuir com o projeto para torná-lo melhor, sua ajuda é sempre bem-vinda.
A contribuição é também uma ótima maneira de aprender mais sobre novas tecnologias e seu ecosistema para torná-la mais construtiva, livre de bugs e mantê-la sempre sempre atualizada.

### Como criar um pull request no Github

* Crie um fork deste projeto no Github para sua conta.
* Faça o clone do seu fork em sua máquina local. O `remote` padrão do seu repositório (no caso o fork criado) será `origin`.
* Adicione o repositório original, no caso este, como um novo `remote` chamado `upstream`.
```bash
$ git remote add upstream git@github.com:vendor/repository.git
```
* Se você criou seu fork há algum tempo certifique-se de atualizar seu repositório com o código mais atualizado do repositório original.
* Crie um novo branch no qual você vai fazer sua implementação. Crie a partir do branch `master`.
```bash
$ git checkout -b hotfix/ticket-number
```
* Implemente seu fix ou sua feature, não esquecendo de comentar seu código.
* Siga o estilo de código que existe no projeto, incluindo as indentações corretas.
* Execute todos os testes disponíveis para se certificar que nenhuma parte da SDK foi comprometida pelo novo código.
* Escreva e adapte testes para seu código, caso necessário.
* Inclua a documentação do seu código.
* Dê um `push` do seu projeto para o seu fork no Github, o `remote origin`.
* A partir do seu fork no Github, crie um novo `pull request` do branch. Aponte para o branch `develop` do projeto original.
* Caso o mantenedor do projeto solicite alguma alteração no seu código, altere seu branch e dê um push para seu fork no Github. O Pull Request será atualizado automaticamente.
* Uma vez que o código tenha sido aprovado e mergeado no projeto oficial, você pode atualizar seu remote `upstream` para sua máquina local e remover os branches que criou.

E por último, mas não menos importante: sempre comente seus códigos e commits. A mensagem do seu commit deve descrever o que o commit, quando aplicado, fará ao código.
 
[Voltar](../../README.md)
