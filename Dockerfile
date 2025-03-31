FROM ghcr.io/ansible/ansible-runner:latest

WORKDIR /ansible
COPY . .

CMD ["ansible-playbook", "ansible/playbook-deploy.yml", "-i", "ansible/inventory.ini"]
