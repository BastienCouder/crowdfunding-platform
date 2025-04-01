FROM alpine/ansible:latest

WORKDIR /ansible

COPY ansible/ .

ENTRYPOINT ["ansible-playbook", "playbook-deploy.yml"]
CMD ["-i", "inventory", "--ask-vault-pass"]