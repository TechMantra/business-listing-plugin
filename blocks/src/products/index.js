import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps } from '@wordpress/block-editor';

registerBlockType('blp/business-products', {
    title: 'Products',
    icon: 'businessman',
    category: 'widgets',
    edit() {
        const blockProps = useBlockProps();
        return (
            <div {...blockProps}>
                <p>Products Block</p>
            </div>
        );
    },
    save() {
        const blockProps = useBlockProps.save();
        return (
            <div {...blockProps}>
                <p>Products Block</p>
            </div>
        );
    }
});
