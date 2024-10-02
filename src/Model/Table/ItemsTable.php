<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Items Model
 *
 * @property \App\Model\Table\DesignDraftsTable&\Cake\ORM\Association\BelongsTo $DesignDrafts
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\Item newEmptyEntity()
 * @method \App\Model\Entity\Item newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Item> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Item get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Item findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Item patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Item> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Item|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Item saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Item>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Item>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Item>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Item> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Item>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Item>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Item>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Item> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ItemsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('items');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('DesignDrafts', [
            'foreignKey' => 'design_draft_id',
        ]);
        $this->belongsTo('Orders', [
            'foreignKey' => 'order_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 256)
            ->allowEmptyString('name');

        $validator
            ->integer('price')
            ->allowEmptyString('price');

        $validator
            ->integer('quantity')
            ->allowEmptyString('quantity');

        $validator
            ->integer('design_draft_id')
            ->allowEmptyString('design_draft_id');

        $validator
            ->integer('order_id')
            ->allowEmptyString('order_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['design_draft_id'], 'DesignDrafts'), ['errorField' => 'design_draft_id']);
        $rules->add($rules->existsIn(['order_id'], 'Orders'), ['errorField' => 'order_id']);

        return $rules;
    }
}
